<?php


namespace Domains\Categories\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Category",
 *     description="Category",
 *     required={"name", "type", "is_hidden"}
 * )
 */
class CategoryVirtual
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
     *      title="Category name",
     *      description="Name of category",
     *      example="Test category"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Type of category",
     *      description="1 for income, -1 for outcome",
     *      type="object",
     *      @OA\Property(property="id", type="integer", example="1" ),
     *      @OA\Property(property="value", type="string", example="Income"),
     * )
     *
     * @var array
     */
    public $type;

    /**
     * @OA\Property(
     *     title="Is hidden",
     *     description="Is category hidden",
     *     example="false"
     * )
     *
     * @var boolean
     */
    public $is_hidden;

    /**
     * @OA\Property(
     *     title="Parent ID",
     *     description="Parent ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $parent;

    /**
     * @OA\Property(
     *     title="Sys category ID",
     *     description="Sys category ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $sys_category;

    /**
     * @OA\Property(
     *     title="Last used at",
     *     description="Last used at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $last_used_at;


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
    public $created_at;
}
