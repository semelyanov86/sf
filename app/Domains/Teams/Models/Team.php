<?php

namespace Domains\Teams\Models;

use Parents\Models\Model;
use \DateTimeInterface;

class Team extends Model
{

    public $table = 'teams';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'name',
        'owner_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
