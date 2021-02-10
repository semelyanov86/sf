<?php


namespace Domains\Budgets\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Budget",
 *     description="Budget model",
 *     required={"category_id", "plan", "user_id", "team_id"}
 * )
 */
class BudgetVirtual
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
     *      title="Category ID",
     *      description="ID of current category",
     *      example=1
     * )
     *
     * @var integer
     */
    public $category_id;

    /**
     * @OA\Property(
     *      title="Plan",
     *      description="Current budget plan",
     * )
     *
     * @var \Domains\Budgets\Virtual\Models\CurrencyVirtualModel
     */
    public $plan;

    /**
     * @OA\Property(
     *      title="User ID",
     *      description="ID of current user",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;

    /**
     * @OA\Property(
     *      title="Team ID",
     *      description="ID of current team",
     *      example=1
     * )
     *
     * @var integer
     */
    public $team_id;


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

    /**
     * @OA\Property(
     *      title="Team",
     *      description="Team's relation",
     * )
     *
     * @var \Domains\Teams\Virtual\Models\Team
     */
    public $team;

    /**
     * @OA\Property(
     *      title="Team",
     *      description="Team's relation",
     * )
     *
     * @var \Domains\Users\Virtual\Models\User
     */
    public $user;

    /**
     * @OA\Property(
     *      title="Team",
     *      description="Team's relation",
     * )
     *
     * @var \Domains\Categories\Virtual\Models\CategoryVirtual
     */
    public $category;
}
