<?php

/**
 * @OA\Schema(
 *      title="Update Permission request",
 *      description="Update Permission request body data",
 *      type="object",
 *      required={"title"}
 * )
 */

class UpdatePermissionRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Name of the new permission",
     *      example="see_posts"
     * )
     *
     * @var string
     */
    public $title;

}
