<?php


namespace Domains\Accounts\Repositories;


final class AccountsExtraRepository extends \Parents\Repositories\Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id'    => '='
    ];
}
