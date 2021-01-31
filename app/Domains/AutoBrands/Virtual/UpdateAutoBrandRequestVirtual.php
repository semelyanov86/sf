<?php


namespace Domains\AutoBrands\Virtual;

/**
 * @OA\Schema(
 *      title="Update auto brand request",
 *      description="Update auto brand request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class UpdateAutoBrandRequestVirtual
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new auto brand",
     *      example="Lada Vesta"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of auto brand",
     *      example="Super car!"
     * )
     *
     * @var string
     */
    public $description;
}
