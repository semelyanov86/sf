<?php

namespace Domains\Accounts\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\Accounts\Http\Requests\MassDestroyAccountRequest;
use Domains\Accounts\Http\Requests\StoreAccountRequest;
use Domains\Accounts\Http\Requests\UpdateAccountRequest;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountType;
use Domains\Banks\Models\Bank;
use Domains\Currencies\Models\Currency;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::with(['account_type', 'currency', 'bank', 'team'])->get();

        return view('frontend.accounts.index', compact('accounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_types = AccountType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = Bank::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.accounts.create', compact('account_types', 'currencies', 'banks'));
    }

    public function store(StoreAccountRequest $request)
    {
        $account = Account::create($request->all());

        return redirect()->route('frontend.accounts.index');
    }

    public function edit(Account $account)
    {
        abort_if(Gate::denies('account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_types = AccountType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = Bank::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $account->load('account_type', 'currency', 'bank', 'team');

        return view('frontend.accounts.edit', compact('account_types', 'currencies', 'banks', 'account'));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());

        return redirect()->route('frontend.accounts.index');
    }

    public function show(Account $account)
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->load('account_type', 'currency', 'bank', 'team', 'sourceAccountOperations', 'accountFromTargets');

        return view('frontend.accounts.show', compact('account'));
    }

    public function destroy(Account $account)
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountRequest $request)
    {
        Account::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
