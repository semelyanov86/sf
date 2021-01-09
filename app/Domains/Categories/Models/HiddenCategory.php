<?php

namespace Domains\Categories\Models;

use Domains\Categories\Factories\HiddenCategoriesFactory;
use Domains\Categories\Models\Category;
use Domains\Users\Models\User;
use Parents\Models\Model;
use \DateTimeInterface;

class HiddenCategory extends Model
{

    public $table = 'hidden_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
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
     * Create a new factory instance for the model.
     *
     * @return HiddenCategoriesFactory
     */
    protected static function newFactory(): HiddenCategoriesFactory
    {
        return HiddenCategoriesFactory::new();
    }
}
