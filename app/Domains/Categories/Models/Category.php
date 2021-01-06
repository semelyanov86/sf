<?php

namespace Domains\Categories\Models;

use Carbon\Carbon;
use Parents\Models\Model;
use \DateTimeInterface;

class Category extends Model
{

    public $table = 'categories';

    const TYPE_SELECT = [
        '1'  => 'Income',
        '-1' => 'Outcome',
    ];

    protected $dates = [
        'last_used_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'type',
        'is_hidden',
        'parent',
        'sys_category',
        'last_used_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function categoryBudgets()
    {
        return $this->hasMany(Budget::class, 'category_id', 'id');
    }

    public function categoryOperations()
    {
        return $this->hasMany(Operation::class, 'category_id', 'id');
    }

    public function getLastUsedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setLastUsedAtAttribute($value)
    {
        $this->attributes['last_used_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
