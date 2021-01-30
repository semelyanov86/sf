<?php


namespace Domains\Currencies\Virtual;

/**
 * @OA\Schema(
 *      title="Store Currency request",
 *      description="Store Currency request body data",
 *      type="object",
 *      required={"course"}
 * )
 */
class UpdateCurrencyRequestVirtual
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new currency",
     *      example="Российский рубль"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="code",
     *      description="Code of new currency",
     *      example="RUB"
     * )
     *
     * @var string
     */
    public $code;

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
     *   @OA\Property(
     *     property="users", description="List of users", type="array",
     *     @OA\Items()
     *  )
     * @var array
     */
    public $users;

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
}
