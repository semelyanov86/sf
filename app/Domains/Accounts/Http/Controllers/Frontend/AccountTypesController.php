<?php

namespace Domains\Accounts\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
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

    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountTypes = AccountType::all();

        return view('frontend.accountTypes.index', compact('accountTypes'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accountTypes.create');
    }

    public function store(StoreAccountTypeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $accountType = AccountType::create($request->all());

        return redirect()->route('frontend.account-types.index');
    }

    public function edit(AccountType $accountType): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accountTypes.edit', compact('accountType'));
    }

    public function update(UpdateAccountTypeRequest $request, AccountType $accountType): \Illuminate\Http\RedirectResponse
    {
        $accountType->update($request->all());

        return redirect()->route('frontend.account-types.index');
    }

    public function show(AccountType $accountType): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accountTypes.show', compact('accountType'));
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
