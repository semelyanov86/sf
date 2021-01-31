<?php


namespace Domains\CardTypes\Virtual;

/**
 * @OA\Schema(
 *      title="Store Card Type request",
 *      description="Store Card Type request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreCardTypeRequestVirtual
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new card type",
     *      example="Visa"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of new card type",
     *      example="Visa card credit"
     * )
     *
     * @var string
     */
    public $description;
}
