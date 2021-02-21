<?php


namespace Domains\Accounts\Virtual\Models;

/**
 * @internal
 * @OA\Schema(
 *     title="AccountType",
 *     description="Account Type Model",
 *     required={"name"}
 * )
 */
class AccountTypeVirtual
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of account",
     *      example="Super Cash"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Parent Description",
     *      description="Parent Description of account",
     *      example="Cash vallet of administrator"
     * )
     *
     * @var string
     */
    public $parent_description;
}
