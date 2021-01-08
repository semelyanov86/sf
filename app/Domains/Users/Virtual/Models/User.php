<?php

namespace Domains\Users\Virtual\Models;
/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     required={"name", "email", "login"}
 * )
 */
class User
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new user",
     *      example="Sergey Emelyanov"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Login",
     *      description="Login of our user",
     *      example="sergeyem"
     * )
     *
     * @var string
     */
    public $login;

    /**
     * @OA\Property(
     *     format="email",
     *      title="Email",
     *      description="Email of user",
     *      example="se@sergeyem.ru"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @OA\Property(
     *      title="Team",
     *      description="Team's relation",
     * )
     *
     * @var \Domains\Teams\Virtual\Models\Team
     */
    public $team;

    /**
     * @OA\Property(
     *     title="Operations Number",
     *     description="List of operations per page",
     *     format="int64",
     *     example=10
     * )
     *
     * @var integer
     */
    public $operations_number;

    /**
     * @OA\Property(
     *     title="Budget Day Start",
     *     description="When starts of budget day of user",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $budget_day_start;

    /**
     * @OA\Property(
     *      title="Primary Currency",
     *      description="Default currency for user",
     *      example="RUB"
     * )
     *
     * @var string
     */
    public $primary_currency;

    /**
     * @OA\Property(
     *      title="Timezone",
     *      description="Default timezone for user",
     *      example="UTC"
     * )
     *
     * @var string
     */
    public $timezone;

    /**
     * @OA\Property(
     *      title="Phone",
     *      description="User phone number",
     *      example="79876757777"
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="Language",
     *      description="User language interface",
     *      example="ru_ru"
     * )
     *
     * @var string
     */
    public $language;

    /**
     * @OA\Property(
     *     description="Roles",
     *     title="Assigned roles to user",
     *     @OA\Xml(
     *         name="role",
     *         wrapped=true
     *     ),
     * )
     *
     * @var \Domains\Users\Virtual\Models\Role[]
     */
    public $roles;

}
