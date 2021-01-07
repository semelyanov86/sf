<?php
/**
 * @OA\Schema(
 *      title="Store User request",
 *      description="Store User request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreUserRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new user",
     *      example="Sergey Emelyanov"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the new user",
     *      example="This is new user email"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="team_id",
     *      description="Team ID of new user",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $team_id;
}
