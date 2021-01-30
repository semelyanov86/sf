<?php


namespace Domains\Countries\Virtual\Controllers;


class CountriesApiVirtual
{
    /**
     * @OA\Get (
     *      path="/countries",
     *      operationId="getCountriesList",
     *      tags={"Countries"},
     *      summary="Get list of Countries registered in system",
     *      description="Returns list of Countries",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/CountryResource")
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
     *      path="/countries",
     *      operationId="storeCountry",
     *      tags={"Countries"},
     *      summary="Store new country",
     *      description="Returns country data",
     *
     * @OA\RequestBody (
     *          required=true,
     *          @OA\JsonContent (ref="#/components/schemas/StoreCountryRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/CountryVirtual")
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
     *      path="/countries/{id}",
     *      operationId="getCountryById",
     *      tags={"Countries"},
     *      summary="Get country information",
     *      description="Returns country data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Country id",
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
     *          @OA\JsonContent (ref="#/components/schemas/CountryVirtual")
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
     *      path="/countries/{id}",
     *      operationId="updateCountry",
     *      tags={"Countries"},
     *      summary="Update existing country",
     *      description="Returns updated country data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Country id",
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
     *          @OA\JsonContent (ref="#/components/schemas/UpdateCountryRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/CountryVirtual")
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
     *      path="/countries/{id}",
     *      operationId="deleteCountry",
     *      tags={"Countries"},
     *      summary="Delete existing country",
     *      description="Deletes a record and returns no content",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Country id",
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
