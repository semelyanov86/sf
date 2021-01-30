<?php


namespace Domains\Countries\Virtual;

/**
 * @OA\Schema(
 *      title="Update Country request",
 *      description="Update country request body data",
 *      type="object",
 *      required={"name", "short_code"}
 * )
 */
class UpdateCountryRequestVirtual
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
