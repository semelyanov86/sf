<?php
/**
 * @OA\Schema(
 *     title="PermissionResource",
 *     description="Permission resource",
 *     @OA\Xml(
 *         name="PermissionResource"
 *     )
 * )
 */
class PermissionResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \Domains\Users\Virtual\Models\Permission[]
     */
    private $data;
}
