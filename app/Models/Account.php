<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Account extends Model
{
    use SoftDeletes, MultiTenantModelTrait, HasFactory;

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

    public function sourceAccountOperations()
    {
        return $this->hasMany(Operation::class, 'source_account_id', 'id');
    }

    public function accountFromTargets()
    {
        return $this->hasMany(Target::class, 'account_from_id', 'id');
    }

    public function account_type()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}