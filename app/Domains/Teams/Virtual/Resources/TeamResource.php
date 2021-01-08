<?php
/**
 * @OA\Schema(
 *     title="TeamResource",
 *     description="Team resource",
 *     @OA\Xml(
 *         name="TeamResource"
 *     )
 * )
 */
class TeamResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var  \Domains\Teams\Virtual\Models\Team[]
     */
    private $data;
}
