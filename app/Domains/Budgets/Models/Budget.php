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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @psalm-return \Illuminate\Database\Eloquent\Relations\BelongsTo<Team>
     */
    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getPlanAttribute($value): ?\Akaunting\Money\Money
    {
        $code = \Auth::user()?->currency?->code;
        if (!$code) {
            return null;
        }
        return $value ? money($value, $code) : null;
    }

    public function setPlanAttribute($value): void
    {
        $this->attributes['plan'] = $value ? $value * 100 : null;
    }
}
