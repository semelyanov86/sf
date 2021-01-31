<?php


namespace Domains\AutoBrands\Virtual;

/**
 * @OA\Schema(
 *      title="Store Card Type request",
 *      description="Store Card Type request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreAutoBrandRequestVirtual
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new auto brand",
     *      example="Lada vesta"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of new auto brand",
     *      example="Super mega car!"
     * )
     *
     * @var string
     */
    public $description;
}
