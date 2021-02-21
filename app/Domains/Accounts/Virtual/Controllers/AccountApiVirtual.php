<?php


namespace Domains\Accounts\Virtual\Controllers;

/**
 * @internal
 */
class AccountApiVirtual
{
    /**
     * @OA\Get (
     *      path="/accounts",
     *      operationId="getAccountsList",
     *      tags={"Accounts"},
     *      summary="Get list of Accounts registered in system",
     *      description="Returns list of Accounts",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/AccountResource")
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
     * @OA\Post (
     *      path="/accounts",
     *      operationId="storeAccount",
     *      tags={"Accounts"},
     *      summary="Store new Account",
     *      description="Returns Account data",
     *
     * @OA\RequestBody (
     *          required=true,
     *          @OA\JsonContent (ref="#/components/schemas/StoreAccountRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/AccountDataVirtual")
     *   ),
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
    public function store()
    {
    }

    /**
     * @OA\Get (
     *      path="/accounts/{id}",
     *      operationId="getAccountById",
     *      tags={"Accounts"},
     *      summary="Get Account information",
     *      description="Returns Account data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Account id",
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
     *          @OA\JsonContent (ref="#/components/schemas/AccountDataVirtual")
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

    /**
     * @OA\Put (
     *      path="/accounts/{id}",
     *      operationId="updateAccount",
     *      tags={"Accounts"},
     *      summary="Update existing Account",
     *      description="Returns updated Account data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Account id",
     *          required=true,
     *          in="path",
     *
     * @OA\Schema (
     *              type="integer"
     *          )
     *      ),
     *
     * @OA\RequestBody (
     *          required=true,
     *          @OA\JsonContent (ref="#/components/schemas/UpdateAccountRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/AccountDataVirtual")
     * ),
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
     *      ),
     * @OA\Response (
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     */
    public function update()
    {
    }

    /**
     * @OA\Delete (
     *      path="/accounts/{id}",
     *      operationId="deleteAccount",
     *      tags={"Accounts"},
     *      summary="Delete existing Account",
     *      description="Deletes a record and returns no content",
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
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent ()
     *  ),
     * @OA\Response (
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     * @OA\Response (
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response (
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * ),
     *
     */
    public function destroy()
    {
    }
}
