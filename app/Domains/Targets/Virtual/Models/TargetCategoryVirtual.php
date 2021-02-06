<?php


namespace Domains\Targets\Virtual\Models;

/**
 * @OA\Schema(
 *     title="TargetCategory",
 *     description="Target Category",
 *     required={"target_category_name", "target_category_type"}
 * )
 */
class TargetCategoryVirtual
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
     *      title="Target category name",
     *      description="Name of target category",
     *      example="Test category"
     * )
     *
     * @var string
     */
    public $target_category_name;

    /**
     * @OA\Property(
     *      title="Type of category",
     *      description="2 for pay, 1 for save",
     *      example="1"
     * )
     *
     * @var int
     */
    public $target_category_type;

    /**
     * @OA\Property(
     *     title="Target category image",
     *     description="Path to image",
     *     example=""
     * )
     *
     * @var string
     */
    public $target_category_image;


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
