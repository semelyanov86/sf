<?php


namespace Domains\Targets\Virtual\Resources;

use Domains\Targets\Virtual\Models\TargetCategoryVirtual;

/**
 * @OA\Schema(
 *     title="TargetCategoryResource",
 *     description="Target Category Resource",
 *     @OA\Xml(
 *         name="TargetCategoryResource"
 *     )
 * )
 */
class TargetCategoryResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  TargetCategoryVirtual[]
     */
    private $data;
}
