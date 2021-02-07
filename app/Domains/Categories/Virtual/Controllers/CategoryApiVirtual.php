<?php


namespace Domains\Categories\Virtual\Controllers;


class CategoryApiVirtual
{
    /**
     * @OA\Get (
     *      path="/categories",
     *      operationId="getCategoriesList",
     *      tags={"Categories"},
     *      summary="Get list of categories registered in system",
     *      description="Returns list of Categories",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/CategoryResource")
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
     *      path="/categories",
     *      operationId="storeCategory",
     *      tags={"Categories"},
     *      summary="Store new Category",
     *      description="Returns Categories data",
     *
     * @OA\RequestBody (
     *          required=true,
     *          @OA\JsonContent (ref="#/components/schemas/StoreCategoryRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/CategoryVirtual")
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
     *      path="/categories/{id}",
     *      operationId="getCategoryById",
     *      tags={"Categories"},
     *      summary="Get Category information",
     *      description="Returns Category data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Category id",
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
     *          @OA\JsonContent (ref="#/components/schemas/CategoryVirtual")
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
     *      path="/categories/{id}",
     *      operationId="updateCategory",
     *      tags={"Categories"},
     *      summary="Update existing Category",
     *      description="Returns updated Category data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Category id",
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
     *          @OA\JsonContent (ref="#/components/schemas/UpdateCategoryRequestVirtual")
     *      ),
     *
     * @OA\Response (
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/CategoryVirtual")
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
     *      path="/categories/{id}",
     *      operationId="deleteCategory",
     *      tags={"Categories"},
     *      summary="Delete existing Category",
     *      description="Deletes a record and returns no content",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Category type id",
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
