<?php


namespace Domains\Accounts\Repositories;


use Parents\Repositories\Repository;

/**
 * Class AccountRepository
 * @package Domains\Accounts\Repositories
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AccountRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id'    => '=',
        'name'  => 'like',
        'state' => '='
    ];

    protected array $allowedSorts = [
        'name',
        'account_type_id',
        'created_at',
        'updated_at'
    ];
}
