<?php


namespace Domains\AutoBrands\Virtual\Controllers;


class AutoBrandsApiVirtual
{
    /**
     * @OA\Get (
     *      path="/auto-brands",
     *      operationId="getAutoBrandsList",
     *      tags={"AutoBrands"},
     *      summary="Get list of auto brands registered in system",
     *      description="Returns list of auto brands",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/CardTypeResource")
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
     *      path="/auto-brands",
     *      operationId="storeAutoBrand",
     *      tags={"AutoBrands"},
     *      summary="Store new auto brand",
     *      description="Returns auto brands data",
     *
     * @OA\RequestBody (
     *          required=true,
     *          @OA\JsonContent (ref="#/components/schemas/StoreAutoBrandRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/AutoBrandVirtual")
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
     *      path="/auto-brands/{id}",
     *      operationId="getAutoBrandById",
     *      tags={"AutoBrands"},
     *      summary="Get auto brand information",
     *      description="Returns auto brand data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Auto Brand id",
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
     *          @OA\JsonContent (ref="#/components/schemas/AutoBrandVirtual")
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
     *      path="/auto-brands/{id}",
     *      operationId="updateAutoBrand",
     *      tags={"AutoBrands"},
     *      summary="Update existing auto brand",
     *      description="Returns updated auto brand data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Auto Brand id",
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
     *          @OA\JsonContent (ref="#/components/schemas/UpdateAutoBrandRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/AutoBrandVirtual")
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
     *      path="/auto-brands/{id}",
     *      operationId="deleteAutoBrand",
     *      tags={"AutoBrands"},
     *      summary="Delete existing auto brand",
     *      description="Deletes a record and returns no content",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Auto Brand type id",
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
