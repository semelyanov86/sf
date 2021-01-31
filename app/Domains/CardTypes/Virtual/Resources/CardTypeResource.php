<?php


namespace Domains\CardTypes\Virtual\Resources;

use Domains\CardTypes\Virtual\Models\CardTypeVirtual;

/**
 * @OA\Schema(
 *     title="CardTypeResource",
 *     description="Card Type resource",
 *     @OA\Xml(
 *         name="CardTypeResource"
 *     )
 * )
 */
class CardTypeResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  CardTypeVirtual[]
     */
    private $data;
}
