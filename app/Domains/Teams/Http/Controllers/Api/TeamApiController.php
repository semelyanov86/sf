<?php

namespace Domains\Teams\Http\Controllers\Api;

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
     * @OA\Items (ref="#/components/schemas/Team")
     *         ),
     * @OA\Items (ref="#/components/schemas/Team")
     *         )
     *     ),
     *
     * @OA\XmlContent (
     *             type="array",
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return TeamResource::collection(Team::with(['owner'])->get());
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
     *
     * @OA\JsonContent (ref="#/components/schemas/StoreTeamRequest")
     *      ),
     * @OA\JsonContent (ref="#/components/schemas/Team")
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTeamRequest $request): static
    {
        $team = Team::create($request->all());

        return (new TeamResource($team))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
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
     * @OA\JsonContent (ref="#/components/schemas/Team")
     *       ),
     *
     * @return TeamResource
     */
    public function show(Team $team): TeamResource
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamResource($team->load(['owner']));
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
     *
     * @OA\JsonContent (ref="#/components/schemas/UpdateTeamRequest")
     *      ),
     * @OA\JsonContent (ref="#/components/schemas/Team")
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTeamRequest $request, Team $team): static
    {
        $team->update($request->all());

        return (new TeamResource($team))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team): \Illuminate\Http\Response
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
