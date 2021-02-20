<?php

namespace Domains\Accounts\Http\Controllers\Admin;

use Domains\Accounts\Actions\StoreAccountAction;
use Domains\Accounts\Actions\UpdateAccountAction;
use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Http\Requests\IndexAccountRequest;
use Parents\Controllers\WebController as Controller;
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

    public function index(IndexAccountRequest $request): \Illuminate\View\View
    {
        $accounts = Account::with(['account_type', 'currency', 'bank', 'team'])->get();

        return view('admin.accounts.index', compact('accounts'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_types = AccountType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = Bank::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.accounts.create', compact('account_types', 'currencies', 'banks'));
    }

    public function store(StoreAccountRequest $request, StoreAccountAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(AccountData::fromRequest($request), AccountExtraData::fromRequest($request));

        return redirect()->route('admin.accounts.index');
    }

    public function edit(Account $account): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_types = AccountType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = Bank::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $account->load('account_type', 'currency', 'bank', 'team');

        return view('admin.accounts.edit', compact('account_types', 'currencies', 'banks', 'account'));
    }

    public function update(UpdateAccountRequest $request, Account $account, UpdateAccountAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($account, AccountData::fromRequest($request));

        return redirect()->route('admin.accounts.index');
    }

    public function show(Account $account): \Illuminate\View\View
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->load('account_type', 'currency', 'bank', 'team', 'sourceAccountOperations', 'accountFromTargets');

        return view('admin.accounts.show', compact('account'));
    }

    public function destroy(Account $account): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountRequest $request): \Illuminate\Http\Response
    {
        Account::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
