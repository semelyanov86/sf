<?php

namespace App\Models;

use Domains\Currencies\Models\Currency;
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

class Target extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, HasFactory;

    public $table = 'targets';

    protected $appends = [
        'image',
    ];

    const TARGET_TYPE_SELECT = [
        '1' => 'Save',
        '2' => 'Pay',
    ];

    const TARGET_STATUS_RADIO = [
        '0' => 'Default',
        '1' => 'Starred',
    ];

    protected $dates = [
        'created_at',
        'first_pay_date',
        'pay_to_date',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'target_category_id',
        'currency_id',
        'created_at',
        'account_from_id',
        'user_id',
        'target_type',
        'target_name',
        'target_status',
        'amount',
        'first_pay_date',
        'monthly_pay_amount',
        'pay_to_date',
        'description',
        'target_is_done',
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

    public function target_category()
    {
        return $this->belongsTo(TargetCategory::class, 'target_category_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function account_from()
    {
        return $this->belongsTo(Account::class, 'account_from_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFirstPayDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFirstPayDateAttribute($value)
    {
        $this->attributes['first_pay_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPayToDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPayToDateAttribute($value)
    {
        $this->attributes['pay_to_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getAmountAttribute($value)
    {
        return $value ? money($value, \Auth::user()->currency->code) : null;
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value ? $value * 100 : null;
    }

    public function getMonthlyPayAmountAttribute($value)
    {
        return $value ? money($value, \Auth::user()->currency->code) : null;
    }

    public function setMonthlyPayAmountAttribute($value)
    {
        $this->attributes['monthly_pay_amount'] = $value ? $value * 100 : null;
    }
}
