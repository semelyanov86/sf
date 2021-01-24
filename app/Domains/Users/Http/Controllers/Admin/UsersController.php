<?php

namespace Domains\Users\Http\Controllers\Admin;

use Domains\Users\Actions\DeleteUserAction;
use Domains\Users\Actions\EditUserAction;
use Domains\Users\Actions\GetAllUsersAction;
use Domains\Users\Actions\ShowUserAction;
use Domains\Users\Actions\StoreUserAction;
use Domains\Users\Actions\UpdateUserAction;
use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Enums\LanguageEnum;
use Domains\Users\Http\Requests\CreateUserRequest;
use Domains\Users\Http\Requests\EditUserRequest;
use Domains\Users\Http\Requests\GetAllUsersRequest;
use Domains\Users\Http\Requests\ShowUserRequest;
use Domains\Users\ViewModels\UserEditViewModel;
use Parents\Controllers\WebController as Controller;
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
        return view('admin.users.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateUserRequest $request, EditUserAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.users.create', [
            'viewModel' => $action()
        ]);
    }

    public function store(StoreUserRequest $request, StoreUserAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(UserData::fromRequest($request));

        return redirect()->route('admin.users.index');
    }

    public function edit(EditUserRequest $request, User $user, EditUserAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $user->load(['roles', 'team']);

        return view('admin.users.edit', [
            'viewModel' => $action(UserData::fromModel($user))
        ]);
    }

    public function update(UpdateUserRequest $request, User $user, UpdateUserAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(UserData::fromRequest($request), $user);

        return redirect()->route('admin.users.index');
    }

    public function show(ShowUserRequest $request, User $user, ShowUserAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $user->load(['roles', 'team', 'userOperations', 'usersCurrencies']);

        return view('admin.users.show', [
            'viewModel' => $action(UserData::fromModel($user))
        ]);
    }

    public function destroy(User $user, DeleteUserAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(UserData::fromModel($user));

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request, DeleteUserAction $action): \Illuminate\Http\Response
    {
        foreach (\request('ids') as $id) {
            $action(UserData::fromModel(User::whereId($id)->first()));
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
