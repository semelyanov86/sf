<?php


namespace Domains\Countries\Virtual\Resources;

use Domains\Countries\Virtual\Models\CountryVirtual;

/**
 * @OA\Schema(
 *     title="CountryResource",
 *     description="Country resource",
 *     @OA\Xml(
 *         name="CountryResource"
 *     )
 * )
 */

class CountryResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  CountryVirtual[]
     */
    private $data;
}
