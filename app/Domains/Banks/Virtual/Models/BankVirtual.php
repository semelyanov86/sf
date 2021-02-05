<?php


namespace Domains\Banks\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Bank",
 *     description="Bank Model",
 *     required={"name"}
 * )
 */
class BankVirtual
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
     *      title="Name",
     *      description="Name of bank",
     *      example="Sberbank"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of bank",
     *      example="Super bank!"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Country ID",
     *     description="ID of attached country",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $country_id;

    /**
     * @OA\Property(
     *      title="Country",
     *      description="Country relation",
     * )
     *
     * @var \Domains\Countries\Virtual\Models\CountryVirtual
     */
    public $country;

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
