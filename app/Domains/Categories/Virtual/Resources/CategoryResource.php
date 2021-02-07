<?php


namespace Domains\Categories\Virtual\Resources;

use Domains\Categories\Virtual\Models\CategoryVirtual;

/**
 * @OA\Schema(
 *     title="CategoryResource",
 *     description="Category Resource",
 *     @OA\Xml(
 *         name="CategoryResource"
 *     )
 * )
 */
class CategoryResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  CategoryVirtual[]
     */
    private $data;
}
