<?php

namespace Domains\Accounts\Models;

use Domains\Accounts\Factories\AccountTypeFactory;
use Parents\Models\Model;
use \DateTimeInterface;

class AccountType extends Model
{

    public $table = 'account_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'parent_description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return AccountTypeFactory
     */
    protected static function newFactory(): AccountTypeFactory
    {
        return AccountTypeFactory::new();
    }
}
