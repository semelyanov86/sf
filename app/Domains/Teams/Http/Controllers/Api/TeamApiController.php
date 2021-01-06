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
    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamResource(Team::with(['owner'])->get());
    }

    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->all());

        return (new TeamResource($team))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamResource($team->load(['owner']));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->all());

        return (new TeamResource($team))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
