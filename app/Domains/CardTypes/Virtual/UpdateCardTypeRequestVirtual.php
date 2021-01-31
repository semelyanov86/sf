<?php


namespace Domains\CardTypes\Virtual;

/**
 * @OA\Schema(
 *      title="Update card type request",
 *      description="Update card type request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class UpdateCardTypeRequestVirtual
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
     *      description="Description of card type",
     *      example="Visa debit card"
     * )
     *
     * @var string
     */
    public $description;
}
