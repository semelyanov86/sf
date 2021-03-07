<?php


namespace Domains\Accounts\Repositories;


final class AccountTypeRepository extends \Parents\Repositories\Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id'    => '=',
        'name'  => 'like',
        'description' => 'like'
    ];
}
