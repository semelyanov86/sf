<?php

namespace Domains\Users\Http\Controllers\Admin;

use Domains\Users\Actions\GetAllPermissionsAction;
use Domains\Users\Actions\StorePermissionAction;
use Domains\Users\Actions\UpdatePermissionAction;
use Domains\Users\DataTransferObjects\PermissionData;
use Domains\Users\Http\Requests\CreatePermissionRequest;
use Domains\Users\Http\Requests\DeletePermissionRequest;
use Domains\Users\Http\Requests\EditPermissionRequest;
use Domains\Users\Http\Requests\GetAllPermissionsRequest;
use Parents\Controllers\WebController as Controller;
use Domains\Users\Http\Requests\MassDestroyPermissionRequest;
use Domains\Users\Http\Requests\StorePermissionRequest;
use Domains\Users\Http\Requests\UpdatePermissionRequest;
use Domains\Users\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    public function index(GetAllPermissionsRequest $request, GetAllPermissionsAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.permissions.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreatePermissionRequest $request): \Illuminate\View\View
    {
        return view('admin.permissions.create');
    }

    public function store(StorePermissionRequest $request, StorePermissionAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(PermissionData::fromRequest($request));

        return redirect()->route('admin.permissions.index');
    }

    public function edit(EditPermissionRequest $request, Permission $permission): \Illuminate\View\View
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission, UpdatePermissionAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(PermissionData::fromRequest($request), $permission);

        return redirect()->route('admin.permissions.index');
    }

    public function show(Permission $permission): \Illuminate\View\View
    {
        return view('admin.permissions.show', compact('permission'));
    }

    public function destroy(DeletePermissionRequest $request, Permission $permission): \Illuminate\Http\RedirectResponse
    {
        $permission->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request): \Illuminate\Http\Response
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
