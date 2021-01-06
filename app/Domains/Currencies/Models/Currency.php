<?php

namespace Domains\Currencies\Models;

use Carbon\Carbon;
use Domains\Users\Models\User;
use Parents\Models\Model;
use \DateTimeInterface;

class Currency extends Model
{

    public $table = 'currencies';

    protected $dates = [
        'update_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'course',
        'update_date',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getUpdateDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setUpdateDateAttribute($value)
    {
        $this->attributes['update_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}