<?php

namespace Domains\Budgets\Models;

use Domains\Categories\Models\Category;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Units\Auth\Traits\MultiTenantModelTrait;
use Parents\Models\Model;
use \DateTimeInterface;

class Budget extends Model
{
    use MultiTenantModelTrait;

    public $table = 'budgets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_id',
        'plan',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getPlanAttribute($value)
    {
        return $value ? money($value, \Auth::user()->currency->code) : null;
    }

    public function setPlanAttribute($value)
    {
        $this->attributes['plan'] = $value ? $value * 100 : null;
    }
}
