<?php


namespace Domains\Currencies\Virtual\Resources;

use Domains\Currencies\Virtual\Models\CurrencyVirtual;

/**
 * @OA\Schema(
 *     title="CurrencyResource",
 *     description="Currency resource",
 *     @OA\Xml(
 *         name="CurrencyResource"
 *     )
 * )
 */
class CurrencyResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  CurrencyVirtual[]
     */
    private $data;
}
