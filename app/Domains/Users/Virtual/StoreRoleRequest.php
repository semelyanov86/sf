<?php
/**
 * @OA\Schema(
 *      title="Store Role request",
 *      description="Store Role request body data",
 *      type="object",
 *      required={"title"}
 * )
 */

class StoreRoleRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Name of the new role",
     *      example="Manager"
     * )
     *
     * @var string
     */
    public $title;
}
