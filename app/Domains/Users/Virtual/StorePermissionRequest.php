<?php
/**
 * @OA\Schema(
 *      title="Store Permission request",
 *      description="Store Permission request body data",
 *      type="object",
 *      required={"title"}
 * )
 */

class StorePermissionRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Name of the new role",
     *      example="see_posts"
     * )
     *
     * @var string
     */
    public $title;
}
