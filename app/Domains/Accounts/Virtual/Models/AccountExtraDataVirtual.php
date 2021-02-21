<?php


namespace Domains\Accounts\Virtual\Models;

/**
 * @internal
 * @OA\Schema(
 *     title="AccountExtra",
 *     description="Account Extra Model",
 *     required={}
 * )
 */
class AccountExtraDataVirtual
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
     *      title="Account deposit type",
     *      description="Account deposit type",
     *      example="Renew"
     * )
     *
     * @var string
     */
    public $account_deposit_type;

    /**
     * @OA\Property(
     *      title="Immovables estate type",
     *      description="Immovables estate type",
     *      example="Appartment"
     * )
     *
     * @var string
     */
    public $immovables_estate_type;

    /**
     * @OA\Property(
     *      title="Account credit payment type",
     *      description="Account credit payment type",
     *      example="Differentiable"
     * )
     *
     * @var string
     */
    public $account_credit_payment_type;

    /**
     * @OA\Property(
     *      title="Auto transmission type",
     *      description="Auto transmission type",
     *      example="Mechanic"
     * )
     *
     * @var string
     */
    public $auto_transmission_type;

    /**
     * @OA\Property(
     *      title="Auto fuel type",
     *      description="Auto fuel type",
     *      example="Gaz"
     * )
     *
     * @var string
     */
    public $auto_fuel_type;

    /**
     * @OA\Property(
     *      title="Account interest period",
     *      description="Account interest period",
     *      example="Every day"
     * )
     *
     * @var string
     */
    public $account_interest_period;

    /**
     * @OA\Property(
     *      title="Card type ID",
     *      description="ID of card type",
     *      example=1
     * )
     *
     * @var integer
     */
    public $card_type_id;

    /**
     * @OA\Property(
     *      title="CardType",
     *      description="CardType's relation",
     * )
     *
     * @var \Domains\CardTypes\Virtual\Models\CardTypeVirtual
     */
    public $card_type;

    /**
     * @OA\Property(
     *     title="Card expire date",
     *     description="Card expire date",
     *     example="2020-03-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $card_expire_date;

    /**
     * @OA\Property(
     *      title="Card year cost",
     *      description="Card year cost"
     * )
     *
     * @var \Domains\Budgets\Virtual\Models\CurrencyVirtualModel
     */
    public $card_year_cost;

    /**
     * @OA\Property(
     *      title="Card credit limit",
     *      description="Card credit limit"
     * )
     *
     * @var \Domains\Budgets\Virtual\Models\CurrencyVirtualModel
     */
    public $card_credit_limit;

    /**
     * @OA\Property(
     *      title="Card rate balance",
     *      description="Card rate balance",
     *      example="15.2"
     * )
     *
     * @var float
     */
    public $card_rate_balance;

    /**
     * @OA\Property(
     *      title="Card ATM commission",
     *      description="Card ATM commission",
     *      example="3.2"
     * )
     *
     * @var float
     */
    public $card_atm_commission;

    /**
     * @OA\Property(
     *      title="Card other ATM commission",
     *      description="Card other ATM commission",
     *      example="5.2"
     * )
     *
     * @var float
     */
    public $card_other_atm_commission;

    /**
     * @OA\Property(
     *      title="Card credit interest rate",
     *      description="Card credit interest rate",
     *      example="10.1"
     * )
     *
     * @var float
     */
    public $card_credit_interest_rate;

    /**
     * @OA\Property(
     *      title="Credit card minimum payment percent",
     *      description="Credit card minimum payment percent",
     *      example="6.5"
     * )
     *
     * @var float
     */
    public $card_credit_min_payment_percent;

    /**
     * @OA\Property(
     *      title="Credit card minimal payment day",
     *      description="Credit card minimum payment day",
     *      example="100.5"
     * )
     *
     * @var float
     */
    public $card_credit_min_payment_day;

    /**
     * @OA\Property(
     *      title="Credit card annual service cost",
     *      description="Credit card annual service cost",
     *      example="500.4"
     * )
     *
     * @var float
     */
    public $card_credit_annual_service_cost;

    /**
     * @OA\Property(
     *      title="Account interest rate",
     *      description="Account interest rate",
     *      example="3.5"
     * )
     *
     * @var float
     */
    public $account_interest_rate;

    /**
     * @OA\Property(
     *      title="Credit card grace period",
     *      description="Credit card grace period",
     *      example="20"
     * )
     *
     * @var integer
     */
    public $card_credit_grace_period;

    /**
     * @OA\Property(
     *     title="Account open date",
     *     description="Account open date",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $account_open_date;

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
