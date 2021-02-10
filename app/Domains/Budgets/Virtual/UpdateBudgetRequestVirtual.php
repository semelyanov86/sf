<?php


namespace Domains\Budgets\Virtual;

/**
 * @OA\Schema(
 *      title="Update Budget request",
 *      description="Update Budget request body data",
 *      type="object",
 *      required={"category_id", "plan"}
 * )
 */
class UpdateBudgetRequestVirtual
{
    /**
     * @OA\Property(
     *      title="category_id",
     *      description="ID of category",
     *      example=1
     * )
     *
     * @var int
     */
    public $category_id;

    /**
     * @OA\Property(
     *      title="plan",
     *      description="Value of current plan",
     *      example=70.5
     * )
     *
     * @var float
     */
    public $plan;

    /**
     * @OA\Property(
     *      title="user_id",
     *      description="ID of user",
     *      example=1
     * )
     *
     * @var int
     */
    public $user_id;
}
