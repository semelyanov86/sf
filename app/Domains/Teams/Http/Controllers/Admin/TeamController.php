<?php

namespace Domains\Teams\Http\Controllers\Admin;

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
    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::with(['owner'])->get();

        return view('admin.teams.index', compact('teams'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teams.create');
    }

    public function store(StoreTeamRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data             = $request->all();
        $data["owner_id"] = auth()->user()->id;
        $team             = Team::create($data);

        return redirect()->route('admin.teams.index');
    }

    public function edit(Team $team): \Illuminate\View\View
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->load('owner');

        return view('admin.teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team): \Illuminate\Http\RedirectResponse
    {
        $team->update($request->all());

        return redirect()->route('admin.teams.index');
    }

    public function show(Team $team): \Illuminate\View\View
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->load('owner');

        return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request): \Illuminate\Http\Response
    {
        Team::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
