<?php


namespace Domains\AutoBrands\Virtual\Resources;

use Domains\AutoBrands\Virtual\Models\AutoBrandVirtual;

/**
 * @OA\Schema(
 *     title="AutoBrandResource",
 *     description="Auto Brand resource",
 *     @OA\Xml(
 *         name="AutoBrandResource"
 *     )
 * )
 */
class AutoBrandResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  AutoBrandVirtual[]
     */
    private $data;
}
