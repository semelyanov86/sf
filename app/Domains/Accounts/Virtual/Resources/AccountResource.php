<?php


namespace Domains\Accounts\Virtual\Resources;

use Domains\Accounts\Virtual\Models\AccountDataVirtual;

/**
 * @OA\Schema(
 *     title="AccountResource",
 *     description="Account Resource",
 *     @OA\Xml(
 *         name="AccountResource"
 *     )
 * )
 */
class AccountResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  AccountDataVirtual[]
     */
    public $data;
}
