<?php
/**
 * @OA\Schema(
 *      title="Store User request",
 *      description="Store User request body data",
 *      type="object",
 *      required={"name", "login", "email", "password"}
 * )
 */

class StoreUserRequest
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
     *      title="Password",
     *      description="Password of new user",
     *      example="password"
     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *      title="Login",
     *      description="User login",
     *      example="sergeyem"
     * )
     *
     * @var string
     */
    public $login;

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
     *      description="Team ID of new user",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $team_id;

    /**
     * @OA\Property(
     *      title="Phone",
     *      description="User [phone number]",
     *      example="+79876757777"
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
}
