<?php

namespace Domains\Users\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Domains\Users\Http\Requests\MassDestroyRoleRequest;
use Domains\Users\Http\Requests\StoreRoleRequest;
use Domains\Users\Http\Requests\UpdateRoleRequest;
use Domains\Users\Models\Permission;
use Domains\Users\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::with(['permissions'])->get();

        return view('frontend.roles.index', compact('roles'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('frontend.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request): \Illuminate\Http\RedirectResponse
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('frontend.roles.index');
    }

    public function edit(Role $role): \Illuminate\View\View
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $role->load('permissions');

        return view('frontend.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role): \Illuminate\Http\RedirectResponse
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('frontend.roles.index');
    }

    public function show(Role $role): \Illuminate\View\View
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('frontend.roles.show', compact('role'));
    }

    public function destroy(Role $role): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request): \Illuminate\Http\Response
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
