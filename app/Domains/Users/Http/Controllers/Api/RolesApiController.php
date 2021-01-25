<?php

namespace Domains\Users\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domains\Users\Actions\DeleteRoleAction;
use Domains\Users\Actions\EditRoleAction;
use Domains\Users\Actions\GetAllRolesAction;
use Domains\Users\Actions\StoreRoleAction;
use Domains\Users\Actions\UpdateRoleAction;
use Domains\Users\DataTransferObjects\RoleData;
use Domains\Users\Http\Requests\DeleteRoleRequest;
use Domains\Users\Http\Requests\GetAllRolesRequest;
use Domains\Users\Http\Requests\ShowRoleRequest;
use Domains\Users\Http\Requests\StoreRoleRequest;
use Domains\Users\Http\Requests\UpdateRoleRequest;
use Domains\Users\Http\Resources\RoleResource;
use Domains\Users\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RolesApiController extends Controller
{
    /**
     * @OA\Get (
     *      path="/roles",
     *      operationId="getRolesList",
     *      tags={"Roles"},
     *      summary="Get list of roles in system",
     *      description="Returns list of roles",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     * @OA\Response (
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     * @OA\Response (
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     *
     * @OA\JsonContent (
     *             type="array",
     *
     * @OA\Items (ref="#/components/schemas/Role")
     *         ),
     * @OA\Items (ref="#/components/schemas/Role")
     *         )
     *     ),
     *
     * @OA\XmlContent (
     *             type="array",
     *)
     * @param  GetAllRolesRequest  $request
     * @param  GetAllRolesAction  $action
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(GetAllRolesRequest $request, GetAllRolesAction $action): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {

        return RoleResource::collection($action()->toJson());
    }

    /**
     * @OA\Post (
     *      path="/[roles]",
     *      operationId="storeRole",
     *      tags={"Roles"},
     *      summary="Store new role",
     *      description="Returns role data",
     *
     * @OA\RequestBody (
     *          required=true,
     *
     * @OA\JsonContent (ref="#/components/schemas/StoreRoleRequest")
     *      ),
     * @OA\JsonContent (ref="#/components/schemas/Role")
     *       ),
     *
     * @OA\Response (
     *          response=201,
     *          description="Successful operation",
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
     * @param  StoreRoleRequest  $request
     * @param  StoreRoleAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRoleRequest $request, StoreRoleAction $action): \Illuminate\Http\JsonResponse
    {
        $dto = RoleData::fromRequest($request);

        return (new RoleResource($action($dto)->role()))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get (
     *      path="/roles/{id}",
     *      operationId="getRoleById",
     *      tags={"Roles"},
     *      summary="Get role information",
     *      description="Returns role data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Role id",
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
     * @OA\JsonContent (ref="#/components/schemas/Role")
     *       ),
     *
     * @param  ShowRoleRequest  $request
     * @param  Role  $role
     * @param  EditRoleAction  $action
     * @return RoleResource
     */
    public function show(ShowRoleRequest $request, Role $role, EditRoleAction $action): RoleResource
    {
        $role->load(['permissions']);

        return new RoleResource($action(RoleData::fromModel($role))->role());
    }

    /**
     * @OA\Put (
     *      path="/role/{id}",
     *      operationId="updateRole",
     *      tags={"Roles"},
     *      summary="Update existing role",
     *      description="Returns updated role data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Role id",
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
     *
     * @OA\JsonContent (ref="#/components/schemas/UpdateRoleRequest")
     *      ),
     * @OA\JsonContent (ref="#/components/schemas/Role")
     *       ),
     *
     * @OA\Response (
     *          response=202,
     *          description="Successful operation",
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
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     * @param  UpdateRoleAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRoleRequest $request, Role $role, UpdateRoleAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(RoleData::fromRequest($role), $role);

        return (new RoleResource($viewModel->role()))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete (
     *      path="/roles/{id}",
     *      operationId="deleteRole",
     *      tags={"Roles"},
     *      summary="Delete existing role",
     *      description="Deletes a record and returns no content",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Role id",
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
     * @OA\JsonContent ()
     *       ),
     *
     * @param  DeleteRoleRequest  $request
     * @param  Role  $role
     * @param  DeleteRoleAction  $action
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DeleteRoleRequest $request, Role $role, DeleteRoleAction $action): \Illuminate\Http\Response
    {
        $action(RoleData::fromModel($role));

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
