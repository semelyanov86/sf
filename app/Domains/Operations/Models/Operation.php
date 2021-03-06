<?php

namespace Domains\Operations\Models;

use Domains\Accounts\Models\Account;
use Domains\Categories\Models\Category;
use Domains\Operations\Enums\TypeSelectEnum;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Parents\ValueObjects\MoneyValueObject;
use Units\Auth\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Parents\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;

class Operation extends Model implements HasMedia
{
    use MultiTenantModelTrait, InteractsWithMedia;

    public $table = 'operations';

    protected $appends = [
        'attachment',
    ];

    protected $dates = [
        'done_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'amount',
        'done_at',
        'source_account_id',
        'to_account_id',
        'type',
        'category_id',
        'description',
        'user_id',
        'related_transactions',
        'cal_repeat',
        'google_sync',
        'remind_operation',
        'is_calendar',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public array $searchable = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDoneAtAttribute($value): Carbon
    {
        return Carbon::parse($value);
    }

    public function getAmountAttribute(int $value): MoneyValueObject
    {
        return MoneyValueObject::fromNative($value);
    }

    public function setAmountAttribute(MoneyValueObject $value): void
    {
        $this->attributes['amount'] = $value->toInt();
    }

    public function getTypeAttribute(int $value): TypeSelectEnum
    {
        return TypeSelectEnum::fromValue($value);
    }

    public function setTypeAttribute(TypeSelectEnum $value): void
    {
        $this->attributes['type'] = (int) $value->value;
    }

    public function getAmountValueAttribute(?int $value): ?float
    {
        if (!$value) {
            return null;
        }
        return $value / 100;
    }

    public function setDoneAtAttribute(\Illuminate\Support\Carbon $value): void
    {
        /** @psalm-suppress PossiblyFalseReference */
        $this->attributes['done_at'] = $value->format('Y-m-d');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<Account>
     */
    public function source_account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class, 'source_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<Account>
     */
    public function to_account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class, 'to_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category>
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAttachmentAttribute(): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->getMedia('attachment')->last();
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
}
