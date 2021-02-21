<?php


namespace Domains\Accounts\Virtual\Resources;

use Domains\Accounts\Virtual\Models\AccountTypeVirtual;

/**
 * @OA\Schema(
 *     title="AccountTypeResource",
 *     description="Account Type Resource",
 *     @OA\Xml(
 *         name="AccountTypeResource"
 *     )
 * )
 */
class AccountTypeResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  AccountTypeVirtual[]
     */
    public $data;
}
