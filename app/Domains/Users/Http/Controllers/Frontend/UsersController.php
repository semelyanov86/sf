<?php

namespace Domains\Users\Http\Controllers\Frontend;

use Domains\Users\Actions\GetAllUsersAction;
use Domains\Users\Http\Requests\GetAllUsersRequest;
use Parents\Controllers\Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\Users\Http\Requests\MassDestroyUserRequest;
use Domains\Users\Http\Requests\StoreUserRequest;
use Domains\Users\Http\Requests\UpdateUserRequest;
use Domains\Users\Models\Role;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Gate;
use Parents\Requests\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    use CsvImportTrait;

    public function index(GetAllUsersRequest $request, GetAllUsersAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('frontend.users.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.users.create', compact('roles', 'teams'));
    }

    public function store(StoreUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('frontend.users.index');
    }

    public function edit(User $user): \Illuminate\View\View
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'team');

        return view('frontend.users.edit', compact('roles', 'teams', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('frontend.users.index');
    }

    public function show(User $user): \Illuminate\View\View
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'team', 'userOperations', 'usersCurrencies');

        return view('frontend.users.show', compact('user'));
    }

    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request): \Illuminate\Http\Response
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
