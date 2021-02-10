<?php


namespace Domains\Budgets\Virtual\Resources;

use Domains\Budgets\Virtual\Models\BudgetVirtual;

/**
 * @OA\Schema(
 *     title="BudgetResource",
 *     description="Budget Resource",
 *     @OA\Xml(
 *         name="BudgetResource"
 *     )
 * )
 */
class BudgetResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  BudgetVirtual[]
     */
    private $data;
}
