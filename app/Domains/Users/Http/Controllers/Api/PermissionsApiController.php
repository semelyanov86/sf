<?php

namespace Domains\Users\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domains\Users\Actions\GetAllPermissionsAction;
use Domains\Users\Actions\ShowPermissionAction;
use Domains\Users\Actions\StorePermissionAction;
use Domains\Users\Actions\UpdatePermissionAction;
use Domains\Users\DataTransferObjects\PermissionData;
use Domains\Users\Http\Requests\DeletePermissionRequest;
use Domains\Users\Http\Requests\GetAllPermissionsRequest;
use Domains\Users\Http\Requests\ShowPermissionRequest;
use Domains\Users\Http\Requests\StorePermissionRequest;
use Domains\Users\Http\Requests\UpdatePermissionRequest;
use Domains\Users\Models\Permission;
use Domains\Users\Transformers\PermissionTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Symfony\Component\HttpFoundation\Response;

class PermissionsApiController extends Controller
{
    /**
     * @OA\Get (
     *      path="/permissions",
     *      operationId="getPermissionsList",
     *      tags={"Permissions"},
     *      summary="Get list of permissions in system",
     *      description="Returns list of permissions",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/PermissionResource")
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
     *
     * @param  GetAllPermissionsRequest  $request
     * @param  GetAllPermissionsAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(GetAllPermissionsRequest $request, GetAllPermissionsAction $action): \Illuminate\Http\JsonResponse
    {
        $actionResult = $action();
        $permissions = $actionResult->permissions();
        return fractal($permissions, new PermissionTransformer())->paginateWith(new IlluminatePaginatorAdapter($actionResult->paginator()))->respond();
    }

    /**
     * @OA\Post (
     *      path="/[permissions]",
     *      operationId="storePermission",
     *      tags={"Permissions"},
     *      summary="Store new permission",
     *      description="Returns permission data",
     *
     * @OA\RequestBody (
     *          required=true,
     *          @OA\JsonContent (ref="#/components/schemas/StorePermissionRequest")
     *      ),
     *
     * @OA\Response (
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/Permission")
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
     * @param  StorePermissionRequest  $request
     * @param  StorePermissionAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePermissionRequest $request, StorePermissionAction $action): \Illuminate\Http\JsonResponse
    {
        $permission = $action(PermissionData::fromRequest($request));
        return fractal($permission->permission(), new PermissionTransformer())->respond(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get (
     *      path="/permissions/{id}",
     *      operationId="getPermissionById",
     *      tags={"Permissions"},
     *      summary="Get permission information",
     *      description="Returns permission data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Permission id",
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
     *          @OA\JsonContent (ref="#/components/schemas/Permission")
     *       ),
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
     * ),
     *
     *
     * @param  ShowPermissionRequest  $request
     * @param  Permission  $permission
     * @param  ShowPermissionAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowPermissionRequest $request, Permission $permission, ShowPermissionAction $action): \Illuminate\Http\JsonResponse
    {
        $permissionData = PermissionData::fromModel($permission);
        return fractal($permissionData, new PermissionTransformer())->respond();
    }

    /**
     * @OA\Put (
     *      path="/permissions/{id}",
     *      operationId="updatePermission",
     *      tags={"Permissions"},
     *      summary="Update existing permission",
     *      description="Returns updated permission data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Permission id",
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
     *          @OA\JsonContent (ref="#/components/schemas/UpdatePermissionRequest")
     *      ),
     *
     * @OA\Response (
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/Permission")
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
     *      ),
     * @OA\Response (
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     * @param  UpdatePermissionRequest  $request
     * @param  Permission  $permission
     * @param  UpdatePermissionAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePermissionRequest $request, Permission $permission, UpdatePermissionAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(PermissionData::fromRequest($request), $permission);
        return fractal($viewModel->permission(), new PermissionTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete (
     *      path="/permissions/{id}",
     *      operationId="deletePermission",
     *      tags={"Permissions"},
     *      summary="Delete existing permission",
     *      description="Deletes a record and returns no content",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Permission id",
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
     *       ),
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
     *          description="Resource Not Found",
     *      )
     * ),
     *
     *
     * @param  Permission  $permission
     * @param  DeletePermissionRequest  $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DeletePermissionRequest $request, Permission $permission): \Illuminate\Http\Response
    {

        $permission->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
