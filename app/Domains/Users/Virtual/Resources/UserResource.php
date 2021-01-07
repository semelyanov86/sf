<?php
/**
 * @OA\Schema(
 *     title="UserResource",
 *     description="User resource",
 *     @OA\Xml(
 *         name="UserResource"
 *     )
 * )
 */
class UserResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var(ref="#/components/schemas/User")
     */
    private $data;
}
