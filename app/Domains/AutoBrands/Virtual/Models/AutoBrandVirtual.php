<?php


namespace Domains\AutoBrands\Virtual\Models;

/**
 * @OA\Schema(
 *     title="AutoBrand",
 *     description="Auto brand Model",
 *     required={"name"}
 * )
 */
class AutoBrandVirtual
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
     *      description="Name of auto brand",
     *      example="Lada Vesta"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of auto brand",
     *      example="Super car!"
     * )
     *
     * @var string
     */
    public $description;

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
