<?php

/**
 * @OA\Schema(
 *      title="Update User request",
 *      description="Update User request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateUserRequest
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
     *      example="se@sergeyem.ru"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="team_id",
     *      description="Team id of the new user",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $team_id;
}
