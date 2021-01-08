<?php

/**
 * @OA\Schema(
 *      title="Update Team request",
 *      description="Update Team request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateTeamRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new team",
     *      example="Secondary Team"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="owner_id",
     *      description="Owner id of the new team",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $owner_id;
}
