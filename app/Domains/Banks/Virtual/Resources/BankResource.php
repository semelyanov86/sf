<?php


namespace Domains\Banks\Virtual\Resources;

use Domains\Banks\Virtual\Models\BankVirtual;

/**
 * @OA\Schema(
 *     title="BankResource",
 *     description="Bank resource",
 *     @OA\Xml(
 *         name="BankResource"
 *     )
 * )
 */
class BankResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  BankVirtual[]
     */
    private $data;
}
