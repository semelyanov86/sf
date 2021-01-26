<?php

namespace Domains\Teams\Http\Controllers\Admin;

use Domains\Teams\Actions\GetAllTeamsAction;
use Domains\Teams\Actions\StoreTeamAction;
use Domains\Teams\Actions\UpdateTeamAction;
use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\Http\Requests\CreateTeamRequest;
use Domains\Teams\Http\Requests\DeleteTeamRequest;
use Domains\Teams\Http\Requests\EditTeamRequest;
use Domains\Teams\Http\Requests\GetAllTeamsRequest;
use Domains\Teams\Http\Requests\ShowTeamRequest;
use Parents\Controllers\WebController as Controller;
use Domains\Teams\Http\Requests\MassDestroyTeamRequest;
use Domains\Teams\Http\Requests\StoreTeamRequest;
use Domains\Teams\Http\Requests\UpdateTeamRequest;
use Domains\Teams\Models\Team;
use Gate;
use Parents\Requests\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    public function index(GetAllTeamsRequest $request, GetAllTeamsAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.teams.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateTeamRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.teams.create');
    }

    public function store(StoreTeamRequest $request, StoreTeamAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(TeamData::fromRequest($request));

        return redirect()->route('admin.teams.index');
    }

    public function edit(EditTeamRequest $request, Team $team): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $team->load('owner');

        return view('admin.teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team, UpdateTeamAction $action): \Illuminate\Http\RedirectResponse
    {
        $teamViewModel = $action(TeamData::fromRequest($request));

        return redirect()->route('admin.teams.index');
    }

    public function show(ShowTeamRequest $request, Team $team): \Illuminate\View\View
    {
        $team->load('owner');

        return view('admin.teams.show', compact('team'));
    }

    public function destroy(DeleteTeamRequest $request, Team $team): \Illuminate\Http\RedirectResponse
    {
        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request): \Illuminate\Http\Response
    {
        Team::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
