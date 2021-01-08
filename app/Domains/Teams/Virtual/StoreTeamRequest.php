<?php
/**
 * @OA\Schema(
 *      title="Store Team request",
 *      description="Store Team request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreTeamRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new team",
     *      example="Secondary"
     * )
     *
     * @var string
     */
    public $name;


    /**
     * @OA\Property(
     *      title="owner_id",
     *      description="User owner of new team",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $owner_id;
}
