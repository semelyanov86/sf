<?php

namespace Domains\AutoBrands\Models;

use Parents\Models\Model;
use \DateTimeInterface;

class AutoBrand extends Model
{

    public $table = 'auto_brands';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
