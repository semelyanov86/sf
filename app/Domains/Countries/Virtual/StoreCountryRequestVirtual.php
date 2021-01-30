<?php


namespace Domains\Countries\Virtual;

/**
 * @OA\Schema(
 *      title="Store Country request",
 *      description="Store Country request body data",
 *      type="object",
 *      required={"name", "short_code"}
 * )
 */
class StoreCountryRequestVirtual
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new country",
     *      example="Russian Federation"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="short_code",
     *      description="Code of new country",
     *      example="ru"
     * )
     *
     * @var string
     */
    public $short_code;
}
