<?php

namespace Domains\Teams\Http\Controllers\Api;

use Domains\Teams\Actions\GetAllTeamsAction;
use Domains\Teams\Actions\StoreTeamAction;
use Domains\Teams\Actions\UpdateTeamAction;
use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\Http\Requests\DeleteTeamRequest;
use Domains\Teams\Http\Requests\GetAllTeamsRequest;
use Domains\Teams\Http\Requests\ShowTeamRequest;
use Domains\Teams\Transformers\TeamTransformer;
use Parents\Controllers\Controller;
use Domains\Teams\Http\Requests\StoreTeamRequest;
use Domains\Teams\Http\Requests\UpdateTeamRequest;
use Domains\Teams\Http\Resources\TeamResource;
use Domains\Teams\Models\Team;
use Gate;
use Parents\Requests\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamApiController extends Controller
{
    /**
     * @OA\Get (
     *      path="/teams",
     *      operationId="getTeamsList",
     *      tags={"Teams"},
     *      summary="Get list of teams registered in system",
     *      description="Returns list of teams",
     *
     * @OA\Response (
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/TeamResource")
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
     * @param  GetAllTeamsRequest  $request
     * @param  GetAllTeamsAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(GetAllTeamsRequest $request, GetAllTeamsAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action();
        return fractal($viewModel->teams(), new TeamTransformer())->respond();
    }

    /**
     * @OA\Post (
     *      path="/teams",
     *      operationId="storeTeam",
     *      tags={"Teams"},
     *      summary="Store new team",
     *      description="Returns team data",
     *
     * @OA\RequestBody (
     *          required=true,
     *          @OA\JsonContent (ref="#/components/schemas/StoreTeamRequest")
     *      ),
     *
     * @OA\Response (
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/Team")
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
     * @param  StoreTeamRequest  $request
     * @param  StoreTeamAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTeamRequest $request, StoreTeamAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(TeamData::fromRequest($request));
        return fractal($viewModel->team(), new TeamTransformer())->parseIncludes(['owner'])->respond(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get (
     *      path="/teams/{id}",
     *      operationId="getTeamById",
     *      tags={"Teams"},
     *      summary="Get team information",
     *      description="Returns team data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Team id",
     *          required=true,
     *          in="path",
     *          @OA\Schema (
     *              type="integer"
     *          )
     *      ),
     *
     * @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/Team")
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
     *      )
     * ),
     *
     * @param  ShowTeamRequest  $request
     * @param  Team  $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowTeamRequest $request, Team $team): \Illuminate\Http\JsonResponse
    {
        return fractal(TeamData::fromModel($team), new TeamTransformer())->parseIncludes(['owner'])->respond();
    }

    /**
     * @OA\Put (
     *      path="/teams/{id}",
     *      operationId="updateTeam",
     *      tags={"Teams"},
     *      summary="Update existing team",
     *      description="Returns updated team data",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Team id",
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
     *          @OA\JsonContent (ref="#/components/schemas/UpdateTeamRequest")
     *      ),
     *
     * @OA\Response (
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent (ref="#/components/schemas/Team")
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
     *      ),
     * @OA\Response (
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     * @param  UpdateTeamRequest  $request
     * @param  Team  $team
     * @param  UpdateTeamAction  $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTeamRequest $request, Team $team, UpdateTeamAction $action): \Illuminate\Http\JsonResponse
    {
        $teamViewModel = $action(TeamData::fromRequest($request), $team);
        return fractal($teamViewModel->team(), new TeamTransformer())->parseIncludes(['owner'])->respond(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete (
     *      path="/teams/{id}",
     *      operationId="deleteTeam",
     *      tags={"Teams"},
     *      summary="Delete existing team",
     *      description="Deletes a record and returns no content",
     *
     * @OA\Parameter (
     *          name="id",
     *          description="Team id",
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
     *
     * @param  DeleteTeamRequest  $request
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DeleteTeamRequest $request, Team $team): \Illuminate\Http\Response
    {
        $team->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
