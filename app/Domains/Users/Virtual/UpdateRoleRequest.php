<?php

/**
 * @OA\Schema(
 *      title="Update Role request",
 *      description="Update Role request body data",
 *      type="object",
 *      required={"title"}
 * )
 */

class UpdateRoleRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Name of the new role",
     *      example="Secondary Manager"
     * )
     *
     * @var string
     */
    public $title;

}
