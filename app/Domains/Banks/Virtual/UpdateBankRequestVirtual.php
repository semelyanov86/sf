<?php


namespace Domains\Banks\Virtual;

/**
 * @OA\Schema(
 *      title="Update Bank request",
 *      description="Update Bank request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class UpdateBankRequestVirtual
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new bank",
     *      example="VTB24"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of bank",
     *      example="Super bank!"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="country_id",
     *      description="Country ID of new bank",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $country_id;
}
