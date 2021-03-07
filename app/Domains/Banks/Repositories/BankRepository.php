<?php


namespace Domains\Banks\Repositories;


final class BankRepository extends \Parents\Repositories\Repository
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
