<?php

namespace Domains\Users\Http\Controllers\Admin;

use Domains\Users\Actions\DeleteRoleAction;
use Domains\Users\Actions\EditRoleAction;
use Domains\Users\Actions\GetAllRolesAction;
use Domains\Users\Actions\StoreRoleAction;
use Domains\Users\Actions\UpdateRoleAction;
use Domains\Users\DataTransferObjects\RoleData;
use Domains\Users\Http\Requests\CreateRoleRequest;
use Domains\Users\Http\Requests\DeleteRoleRequest;
use Domains\Users\Http\Requests\EditRoleRequest;
use Domains\Users\Http\Requests\GetAllRolesRequest;
use Domains\Users\Http\Requests\ShowRoleRequest;
use Parents\Controllers\WebController as Controller;
use Domains\Users\Http\Requests\MassDestroyRoleRequest;
use Domains\Users\Http\Requests\StoreRoleRequest;
use Domains\Users\Http\Requests\UpdateRoleRequest;
use Domains\Users\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    public function index(GetAllRolesRequest $request, GetAllRolesAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.roles.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateRoleRequest $request, EditRoleAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.roles.create', [
            'viewModel' => $action()
        ]);
    }

    public function store(StoreRoleRequest $request, StoreRoleAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(RoleData::fromRequest($request));
        return redirect()->route('admin.roles.index');
    }

    public function edit(EditRoleRequest $request, Role $role, EditRoleAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $role->load('permissions');

        return view('admin.roles.edit', [
            'viewModel' => $action(RoleData::fromModel($role))
        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role, UpdateRoleAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(RoleData::fromRequest($request), $role);

        return redirect()->route('admin.roles.index');
    }

    public function show(ShowRoleRequest $request, Role $role, EditRoleAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $role->load('permissions');

        return view('admin.roles.show', [
            'viewModel' => $action(RoleData::fromModel($role))
        ]);
    }

    public function destroy(DeleteRoleRequest $request, Role $role, DeleteRoleAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(RoleData::fromModel($role));

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request, DeleteRoleAction $action): \Illuminate\Http\Response
    {
        foreach(\request('ids') as $id) {
            $action(RoleData::fromModel(Role::whereId($id)));
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
