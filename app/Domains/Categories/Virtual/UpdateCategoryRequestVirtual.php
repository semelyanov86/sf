<?php


namespace Domains\Categories\Virtual;

/**
 * @OA\Schema(
 *      title="Update Category request",
 *      description="Update Category request body data",
 *      type="object",
 *      required={"name", "type", "is_hidden"}
 * )
 */
class UpdateCategoryRequestVirtual
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new category",
     *      example="Test category"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="type",
     *      description="Type of category. 1 for income or -1 for Outcome",
     *      example="1"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="is_hidden",
     *      description="Is category hidden. 1 for true or 0 for false",
     *      example="0"
     * )
     *
     * @var bool
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

}
