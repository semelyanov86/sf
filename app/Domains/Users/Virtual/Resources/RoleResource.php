<?php
/**
 * @OA\Schema(
 *     title="RoleResource",
 *     description="Role resource",
 *     @OA\Xml(
 *         name="RoleResource"
 *     )
 * )
 */
class RoleResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \Domains\Users\Virtual\Models\Role[]
     */
    private $data;
}
