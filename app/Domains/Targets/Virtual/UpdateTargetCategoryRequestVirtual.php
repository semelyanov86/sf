<?php


namespace Domains\Targets\Virtual;

/**
 * @OA\Schema(
 *      title="Update Target Category request",
 *      description="Update Target Category request body data",
 *      type="object",
 *      required={"target_category_name", "target_category_type"}
 * )
 */
class UpdateTargetCategoryRequestVirtual
{
    /**
     * @OA\Property(
     *      title="target_category_name",
     *      description="Name of the new target category",
     *      example="Test category"
     * )
     *
     * @var string
     */
    public $target_category_name;

    /**
     * @OA\Property(
     *      title="target_category_type",
     *      description="Type of target category. 1 or 2",
     *      example="1"
     * )
     *
     * @var string
     */
    public $target_category_type;

}
