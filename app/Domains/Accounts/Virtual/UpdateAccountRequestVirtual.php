<?php


namespace Domains\Accounts\Virtual;

/**
 * @OA\Schema(
 *      title="Update Account request",
 *      description="Update Account request body data",
 *      type="object",
 *      required={"name", "state", "start_balance", "market_value", "account_type_id"}
 * )
 */
class UpdateAccountRequestVirtual
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new account",
     *      example="Test account"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of new account",
     *      example="Test description account"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="state",
     *      description="State of new account",
     *      example="0"
     * )
     *
     * @var integer
     */
    public $state;

    /**
     * @OA\Property(
     *      title="start_balance",
     *      description="Start balance of new account",
     *      example="1000"
     * )
     *
     * @var integer
     */
    public $start_balance;

    /**
     * @OA\Property(
     *      title="market_value",
     *      description="Market value of new account",
     *      example="500"
     * )
     *
     * @var integer
     */
    public $market_value;

    /**
     * @OA\Property(
     *      title="account_type_id",
     *      description="Relation to account type",
     *      example="5"
     * )
     *
     * @var integer
     */
    public $account_type_id;

    /**
     * @OA\Property(
     *      title="currency_id",
     *      description="Relation to currency model",
     *      example="2"
     * )
     *
     * @var integer
     */
    public $currency_id;
}
