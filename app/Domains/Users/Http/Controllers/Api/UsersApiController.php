<?php

namespace Domains\Users\Http\Controllers\Api;

use Domains\Users\Actions\DeleteUserAction;
use Domains\Users\Actions\GetAllUsersAction;
use Domains\Users\Actions\ShowUserAction;
use Domains\Users\Actions\StoreUserAction;
use Domains\Users\Actions\UpdateUserAction;
use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Http\Requests\DeleteUserRequest;
use Domains\Users\Http\Requests\GetAllUsersRequest;
use Domains\Users\Http\Requests\ShowProfileRequest;
use Domains\Users\Http\Requests\ShowUserRequest;
use Domains\Users\Transformers\UserTransformer;
use Illuminate\Support\Facades\Auth;
use Parents\Controllers\ApiController as Controller;
use Domains\Users\Http\Requests\StoreUserRequest;
use Domains\Users\Http\Requests\UpdateUserRequest;
use Domains\Users\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UsersApiController extends Controller
{
    /**
     * @OA\Get (
     *      path="/users",
     *      operationId="getUsersList",
     *      tags={"Users"},
     *      summary="Get list of users registered in system",
     *      description="Returns list of users",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/UserResource")
     *     ),
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
     * @param GetAllUsersRequest $request
     * @param GetAllUsersAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(GetAllUsersRequest $request, GetAllUsersAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action()->users(), new UserTransformer())->respond();
    }

    /**
     * @OA\Post(
     *      path="/users",
     *      operationId="storeUser",
     *      tags={"Users"},
     *      summary="Store new user",
     *      description="Returns user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreUserRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
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
     * @param  StoreUserRequest  $request
     * @param  StoreUserAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request, StoreUserAction $action): \Illuminate\Http\JsonResponse
    {
        $dto = UserData::fromRequest($request);
        return fractal($action($dto)->user(), new UserTransformer())->parseIncludes(['roles', 'team'])->respond(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/users/{id}",
     *      operationId="getUserById",
     *      tags={"Users"},
     *      summary="Get user information",
     *      description="Returns user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     * @param  ShowUserRequest  $request
     * @param  User  $user
     * @param  ShowUserAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowUserRequest $request, User $user, ShowUserAction $action): \Illuminate\Http\JsonResponse
    {
        $user->load(['roles', 'team']);
        return fractal($action(UserData::fromModel($user))->user(), new UserTransformer())->parseIncludes(['roles', 'team'])->respond();
    }
    /**
     * @OA\Get(
     *      path="/users/profile",
     *      operationId="getProfileInformation",
     *      tags={"Users"},
     *      summary="Get current user information",
     *      description="Returns profile user data",
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
     * @param  ShowProfileRequest  $request
     * @param  ShowUserAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(ShowProfileRequest $request, ShowUserAction $action): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        $user->load(['roles', 'team']);
        return fractal($action(UserData::fromModel($user))->user(), new UserTransformer())->parseIncludes(['roles', 'team'])->respond();
    }

    /**
     * @OA\Put(
     *      path="/users/{id}",
     *      operationId="updateUser",
     *      tags={"Users"},
     *      summary="Update existing user",
     *      description="Returns updated user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateUserRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @param  UpdateUserAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user, UpdateUserAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(UserData::fromRequest($request), $user);
        return fractal($viewModel->user(), new UserTransformer())->parseIncludes(['roles', 'team'])->respond(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/users/{id}",
     *      operationId="deleteUser",
     *      tags={"Users"},
     *      summary="Delete existing user",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     * @param  DeleteUserRequest  $request
     * @param  User  $user
     * @param  DeleteUserAction  $action
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DeleteUserRequest $request, User $user, DeleteUserAction $action): \Illuminate\Http\Response
    {
        $action(UserData::fromModel($user));

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
