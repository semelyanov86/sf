<?php

namespace Domains\Users\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Domains\Users\Http\Requests\MassDestroyPermissionRequest;
use Domains\Users\Http\Requests\StorePermissionRequest;
use Domains\Users\Http\Requests\UpdatePermissionRequest;
use Domains\Users\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        return view('frontend.permissions.index', compact('permissions'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.permissions.create');
    }

    public function store(StorePermissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $permission = Permission::create($request->all());

        return redirect()->route('frontend.permissions.index');
    }

    public function edit(Permission $permission): \Illuminate\View\View
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission): \Illuminate\Http\RedirectResponse
    {
        $permission->update($request->all());

        return redirect()->route('frontend.permissions.index');
    }

    public function show(Permission $permission): \Illuminate\View\View
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request): \Illuminate\Http\Response
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
