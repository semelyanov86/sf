<?php


namespace Domains\Accounts\Virtual\Controllers;

/**
 * @internal
 */
class AccountTypeApiVirtual
{
    /**
     * @OA\Get (
     *      path="/account-types",
     *      operationId="getAccountTypesList",
     *      tags={"Accounts"},
     *      summary="Get list of Account types registered in system",
     *      description="Returns list of Account types",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/AccountTypeResource")
     * ),
     * @OA\Response (
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     * @OA\Response (
     *          response=403,
     *          description="Forbidden"
     *      )
     *     ),
     *
     */
    public function index()
    {
    }

    /**
     * @OA\Get (
     *      path="/account-types/{id}",
     *      operationId="getAccountTypeById",
     *      tags={"Accounts"},
     *      summary="Get Account Type information",
     *      description="Returns Account type data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Account type id",
     *          required=true,
     *          in="path",
     *
     * @OA\Schema (
     *              type="integer"
     *          )
     *      ),
     *
     * @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/AccountTypeVirtual")
     *  ),
     * @OA\Response (
     *          response=400,
     *          description="Bad Request"
     *      ),
     * @OA\Response (
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     * @OA\Response (
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     *
     */
    public function show()
    {
    }
}
