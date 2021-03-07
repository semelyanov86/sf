<?php


namespace Domains\Currencies\Repositories;


final class CurrencyRepository extends \Parents\Repositories\Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id'    => '=',
        'code' => '=',
        'name'  => 'like',
    ];
}
