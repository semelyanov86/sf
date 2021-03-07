<?php

namespace Domains\Accounts\Http\Controllers\Admin;

use Domains\Accounts\Actions\IndexAccountTypesAction;
use Domains\Accounts\Actions\ShowAccountTypeAction;
use Domains\Accounts\Actions\StoreAccountTypeAction;
use Domains\Accounts\Actions\UpdateAccountTypeAction;
use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Http\Requests\IndexAccountTypesRequest;
use Domains\Accounts\Http\Requests\ShowAccountTypeRequest;
use Parents\Controllers\WebController as Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\Accounts\Http\Requests\MassDestroyAccountTypeRequest;
use Domains\Accounts\Http\Requests\StoreAccountTypeRequest;
use Domains\Accounts\Http\Requests\UpdateAccountTypeRequest;
use Domains\Accounts\Models\AccountType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountTypesController extends Controller
{
    use CsvImportTrait;

    public function index(IndexAccountTypesRequest $request, IndexAccountTypesAction $action): \Illuminate\View\View
    {
        $accountTypes = $action()->accountTypes();

        return view('admin.accountTypes.index', compact('accountTypes'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.accountTypes.create');
    }

    public function store(StoreAccountTypeRequest $request, StoreAccountTypeAction $action): \Illuminate\Http\RedirectResponse
    {
        $accountType = $action(AccountTypeData::fromRequest($request));

        return redirect()->route('admin.account-types.index');
    }

    public function edit(AccountType $accountType): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.accountTypes.edit', compact('accountType'));
    }

    public function update(UpdateAccountTypeRequest $request, int $accountType, UpdateAccountTypeAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(AccountTypeData::fromRequest($request), $accountType);

        return redirect()->route('admin.account-types.index');
    }

    public function show(ShowAccountTypeRequest $request, int $accountType, ShowAccountTypeAction $action): \Illuminate\View\View
    {
        $accountType = $action($accountType)->accountType();
        return view('admin.accountTypes.show', compact('accountType'));
    }

    public function destroy(AccountType $accountType): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('account_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountType->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountTypeRequest $request): \Illuminate\Http\Response
    {
        AccountType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
