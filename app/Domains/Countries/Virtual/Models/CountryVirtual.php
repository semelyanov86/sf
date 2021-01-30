<?php


namespace Domains\Countries\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Country",
 *     description="Country Model",
 *     required={"name", "short_code"}
 * )
 */
class CountryVirtual
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
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of country",
     *      example="Russia"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Short Code",
     *      description="Code of country",
     *      example="ru"
     * )
     *
     * @var string
     */
    public $short_code;

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
    private $created_at;

}
