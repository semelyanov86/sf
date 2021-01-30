<?php


namespace Domains\Currencies\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Currency",
 *     description="Currency Model",
 *     required={"name", "code"}
 * )
 */
class CurrencyVirtual
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
    public $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of currency",
     *      example="Российский рубль"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Short Code",
     *      description="Code of currency",
     *      example="RUB"
     * )
     *
     * @var string
     */
    public $code;

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
    public $created_at;

    /**
     * @OA\Property(
     *      title="Course of currency",
     *      description="Current currency course",
     *      example="70.86",
     *      type="float"
     * )
     *
     * @var float
     */
    public $course;

    /**
     * @OA\Property(
     *     title="Update Date",
     *     description="Date of updating course currency",
     *     example="2021-01-28 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $update_date;

    /**
     * @OA\Property(
     *     description="Users",
     *     title="Attached users to currency",
     *     @OA\Xml(
     *         name="user",
     *         wrapped=true
     *     ),
     * )
     *
     * @var \Domains\Users\Virtual\Models\User[]
     */
    public $users;
}
