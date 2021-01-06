<?php

namespace App\Models;

use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Units\Auth\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;

class Operation extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, HasFactory;

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

    const TYPE_SELECT = [
        '0' => 'Expense',
        '1' => 'Income',
        '2' => 'Transaction',
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDoneAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function getAmountAttribute($value)
    {
        return $value ? money($value, \Auth::user()->currency->code) : null;
    }

    public function getAmountValueAttribute($value)
    {
        return $value / 100;
    }

    public function setDoneAtAttribute($value)
    {
        $this->attributes['done_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value ? $value * 100 : null;
    }

    public function source_account()
    {
        return $this->belongsTo(Account::class, 'source_account_id');
    }

    public function to_account()
    {
        return $this->belongsTo(Account::class, 'to_account_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAttachmentAttribute()
    {
        return $this->getMedia('attachment')->last();
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
