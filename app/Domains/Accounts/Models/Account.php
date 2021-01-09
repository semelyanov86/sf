<?php

namespace Domains\Accounts\Models;

use Domains\Banks\Models\Bank;
use Domains\Currencies\Models\Currency;
use Domains\Operations\Models\Operation;
use Domains\Targets\Models\Target;
use Domains\Teams\Models\Team;
use Units\Auth\Traits\MultiTenantModelTrait;
use Parents\Models\Model;
use \DateTimeInterface;

class Account extends Model
{
    use MultiTenantModelTrait;

    public $table = 'accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATE_RADIO = [
        '0' => 'Default',
        '1' => 'Starred',
        '2' => 'Hidden',
    ];

    protected $fillable = [
        'name',
        'account_type_id',
        'state',
        'description',
        'start_balance',
        'currency_id',
        'bank_id',
        'market_value',
        'extra_prefix',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\HasMany<Operation>
     */
    public function sourceAccountOperations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Operation::class, 'source_account_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\HasMany<Target>
     */
    public function accountFromTargets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Target::class, 'account_from_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<AccountType>
     */
    public function account_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<Currency>
     */
    public function currency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<Bank>
     */
    public function bank(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<Team>
     */
    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getStartBalanceAttribute($value): ?\Akaunting\Money\Money
    {
        /** @psalm-suppress PossiblyNullArgument */
        return $value ? money($value, \Auth::user()?->currency?->code) : null;
    }

    public function setStartBalanceAttribute($value): void
    {
        $this->attributes['start_balance'] = $value ? $value * 100 : null;
    }

    public function getMarketValueAttribute($value): ?\Akaunting\Money\Money
    {
        /** @psalm-suppress PossiblyNullArgument */
        return $value ? money($value, \Auth::user()?->currency?->code) : null;
    }

    public function setMarketValueAttribute($value): void
    {
        $this->attributes['market_value'] = $value ? $value * 100 : null;
    }

}
