<?php

namespace Domains\Accounts\Http\Controllers\Admin;

use Domains\Accounts\Actions\DeleteAccountAction;
use Domains\Accounts\Actions\EditAccountViewAction;
use Domains\Accounts\Actions\IndexAccountsAction;
use Domains\Accounts\Actions\ShowAccountAction;
use Domains\Accounts\Actions\StoreAccountAction;
use Domains\Accounts\Actions\UpdateAccountAction;
use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Http\Requests\CreateAccountRequest;
use Domains\Accounts\Http\Requests\DeleteAccountRequest;
use Domains\Accounts\Http\Requests\IndexAccountRequest;
use Domains\Accounts\Http\Requests\ShowAccountRequest;
use Parents\Controllers\WebController as Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\Accounts\Http\Requests\MassDestroyAccountRequest;
use Domains\Accounts\Http\Requests\StoreAccountRequest;
use Domains\Accounts\Http\Requests\UpdateAccountRequest;
use Domains\Accounts\Models\Account;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AccountsController extends Controller
{
    use CsvImportTrait;

    public function index(IndexAccountRequest $request, IndexAccountsAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.accounts.index', [
            'accounts' => $action()
        ]);
    }

    public function create(CreateAccountRequest $request, EditAccountViewAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.accounts.create', [
            'viewModel' => $action()
        ]);
    }

    public function store(StoreAccountRequest $request, StoreAccountAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(AccountData::fromRequest($request), AccountExtraData::fromRequest($request));

        return redirect()->route('admin.accounts.index');
    }

    public function edit(int $id, EditAccountViewAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.accounts.edit', [
            'viewModel' => $action($id)
        ]);
    }

    public function update(UpdateAccountRequest $request, Account $account, UpdateAccountAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($account, AccountData::fromRequest($request), AccountExtraData::fromRequest($request));

        return redirect()->route('admin.accounts.index');
    }

    public function show(ShowAccountRequest $request, int $id, ShowAccountAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.accounts.show', [
            'account' => $action($id)->account()
        ]);
    }

    public function destroy(DeleteAccountRequest $request, int $account, DeleteAccountAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($account);

        return back();
    }

    public function massDestroy(MassDestroyAccountRequest $request): \Illuminate\Http\Response
    {
        Account::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
