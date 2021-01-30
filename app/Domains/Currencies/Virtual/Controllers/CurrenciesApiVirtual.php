<?php


namespace Domains\Currencies\Virtual\Controllers;


class CurrenciesApiVirtual
{
    /**
     * @OA\Get (
     *      path="/currencies",
     *      operationId="getCurrenciesList",
     *      tags={"Currencies"},
     *      summary="Get list of currencies registered in system",
     *      description="Returns list of currencies",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/CurrencyResource")
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
     *      path="/currencies",
     *      operationId="storeCurrency",
     *      tags={"Currencies"},
     *      summary="Store new currency",
     *      description="Returns currency data",
     *
     * @OA\RequestBody (
     *          required=true,
     *          @OA\JsonContent (ref="#/components/schemas/StoreCurrencyRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/CurrencyVirtual")
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
     *      path="/currencies/{id}",
     *      operationId="getCurrencyById",
     *      tags={"Currencies"},
     *      summary="Get currency information",
     *      description="Returns currency data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Currency id",
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
     *          @OA\JsonContent (ref="#/components/schemas/CurrencyVirtual")
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
     *      path="/currencies/{id}",
     *      operationId="updateCurrency",
     *      tags={"Currencies"},
     *      summary="Update existing currency",
     *      description="Returns updated currency data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Currency id",
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
     *          @OA\JsonContent (ref="#/components/schemas/UpdateCurrencyRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/CurrencyVirtual")
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
     *      path="/currencies/{id}",
     *      operationId="deleteCurrency",
     *      tags={"Currencies"},
     *      summary="Delete existing currency",
     *      description="Deletes a record and returns no content",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Currency id",
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
