<?php


namespace Domains\Accounts\Virtual\Models;

/**
 * @internal
 * @OA\Schema(
 *     title="Account",
 *     description="Account Model",
 *     required={"name", "state", "start_balance", "market_value"}
 * )
 */
class AccountDataVirtual
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $id;

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
     *      title="Description",
     *      description="Description of account",
     *      example="Cash vallet of administrator"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Start Balance",
     *      description="Account starting balance"
     * )
     *
     * @var \Domains\Budgets\Virtual\Models\CurrencyVirtualModel
     */
    public $start_balance;

    /**
     * @OA\Property(
     *      title="Market value",
     *      description="Account market value"
     * )
     *
     * @var \Domains\Budgets\Virtual\Models\CurrencyVirtualModel
     */
    public $market_value;

    /**
     * @OA\Property(
     *      title="State",
     *      description="State of account",
     *      example="Default"
     * )
     *
     * @var string
     */
    public $state;

    /**
     * @OA\Property(
     *      title="Account Type ID",
     *      description="ID of account type",
     *      example=1
     * )
     *
     * @var integer
     */
    public $account_type_id;

    /**
     * @OA\Property(
     *      title="Currency ID",
     *      description="ID of selected currency",
     *      example=1
     * )
     *
     * @var integer
     */
    public $currency_id;

    /**
     * @OA\Property(
     *      title="Bank ID",
     *      description="ID of selected bank",
     *      example=1
     * )
     *
     * @var integer
     */
    public $bank_id;

    /**
     * @OA\Property(
     *      title="Bank",
     *      description="Bank's relation",
     * )
     *
     * @var \Domains\Banks\Virtual\Models\BankVirtual
     */
    public $bank;

    /**
     * @OA\Property(
     *      title="Account Type",
     *      description="Account Type's relation",
     * )
     *
     * @var \Domains\Accounts\Virtual\Models\AccountTypeVirtual
     */
    public $account_type;

    /**
     * @OA\Property(
     *      title="Currency",
     *      description="Currency's relation",
     * )
     *
     * @var \Domains\Currencies\Virtual\Models\CurrencyVirtual
     */
    public $currency;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $created_at;
}
