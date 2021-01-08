<?php

namespace Domains\Users\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domains\Users\Http\Requests\StorePermissionRequest;
use Domains\Users\Http\Requests\UpdatePermissionRequest;
use Domains\Users\Http\Resources\PermissionResource;
use Domains\Users\Models\Permission;
use Gate;
use Parents\Requests\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/permissions",
     *      operationId="getPermissionsList",
     *      tags={"Permissions"},
     *      summary="Get list of permissions in system",
     *      description="Returns list of permissions",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Permission")
     *         ),
     *         @OA\XmlContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Permission")
     *         )
     *     ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return PermissionResource::collection(Permission::all());
    }
    /**
     * @OA\Post(
     *      path="/[permissions]",
     *      operationId="storePermission",
     *      tags={"Permissions"},
     *      summary="Store new permission",
     *      description="Returns permission data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePermissionRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Permission")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return (new PermissionResource($permission))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
    /**
     * @OA\Get(
     *      path="/permissions/{id}",
     *      operationId="getPermissionById",
     *      tags={"Permissions"},
     *      summary="Get permission information",
     *      description="Returns permission data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Permission id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PermissionResource($permission);
    }
    /**
     * @OA\Put(
     *      path="/permissions/{id}",
     *      operationId="updatePermission",
     *      tags={"Permissions"},
     *      summary="Update existing permission",
     *      description="Returns updated permission data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Permission id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdatePermissionRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Permission")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return (new PermissionResource($permission))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
    /**
     * @OA\Delete(
     *      path="/permissions/{id}",
     *      operationId="deletePermission",
     *      tags={"Permissions"},
     *      summary="Delete existing permission",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Permission id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
