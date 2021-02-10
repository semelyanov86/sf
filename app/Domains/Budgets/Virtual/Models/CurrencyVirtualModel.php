<?php


namespace Domains\Budgets\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Currency",
 *     description="Currency model",
 * )
 */
class CurrencyVirtualModel
{
    /**
     * @OA\Property(
     *      title="Amount",
     *      description="Amount",
     *      example=1043
     * )
     *
     * @var integer
     */
    public $amount;

    /**
     * @OA\Property(
     *      title="Value",
     *      description="Value",
     *      example=10.43
     * )
     *
     * @var float
     */
    public $value;

    /**
     * @OA\Property(
     *      title="Currency name",
     *      description="RUB",
     *      type="object",
     *      @OA\Property(property="name", type="string", example="Russian Ruble" ),
     *      @OA\Property(property="code", type="integer", example=643),
     *     @OA\Property(property="rate", type="integer", example=1),
     *     @OA\Property(property="precision", type="integer", example=2),
     *     @OA\Property(property="subunit", type="integer", example=100),
     *     @OA\Property(property="symbol", type="string", example="₽"),
     *     @OA\Property(property="symbol_first", type="boolean", example=false),
     *     @OA\Property(property="decimal_mark", type="string", example=","),
     *     @OA\Property(property="thousands_separator", type="string", example="."),
     *     @OA\Property(property="prefix", type="string", example=""),
     *     @OA\Property(property="suffix", type="string", example=" ₽"),
     * )
     *
     * @var object
     */
    public $currency;
}
