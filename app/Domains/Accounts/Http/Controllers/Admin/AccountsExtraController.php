<?php

namespace Domains\Accounts\Http\Controllers\Admin;

use Parents\Controllers\WebController as Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\Accounts\Http\Requests\MassDestroyAccountsExtraRequest;
use Domains\Accounts\Http\Requests\StoreAccountsExtraRequest;
use Domains\Accounts\Http\Requests\UpdateAccountsExtraRequest;
use Domains\Accounts\Models\AccountsExtra;
use Domains\AutoBrands\Models\AutoBrand;
use Domains\CardTypes\Models\CardType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountsExtraController extends Controller
{
    use CsvImportTrait;

    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('accounts_extra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountsExtras = AccountsExtra::with(['card_type', 'auto_brand', 'team'])->get();

        return view('admin.accountsExtras.index', compact('accountsExtras'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('accounts_extra_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $card_types = CardType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auto_brands = AutoBrand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.accountsExtras.create', compact('card_types', 'auto_brands'));
    }

    public function store(StoreAccountsExtraRequest $request): \Illuminate\Http\RedirectResponse
    {
        $accountsExtra = AccountsExtra::create($request->all());

        return redirect()->route('admin.accounts-extras.index');
    }

    public function edit(AccountsExtra $accountsExtra): \Illuminate\View\View
    {
        abort_if(Gate::denies('accounts_extra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $card_types = CardType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auto_brands = AutoBrand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accountsExtra->load('card_type', 'auto_brand', 'team');

        return view('admin.accountsExtras.edit', compact('card_types', 'auto_brands', 'accountsExtra'));
    }

    public function update(UpdateAccountsExtraRequest $request, AccountsExtra $accountsExtra): \Illuminate\Http\RedirectResponse
    {
        $accountsExtra->update($request->all());

        return redirect()->route('admin.accounts-extras.index');
    }

    public function show(AccountsExtra $accountsExtra): \Illuminate\View\View
    {
        abort_if(Gate::denies('accounts_extra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountsExtra->load('card_type', 'auto_brand', 'team');

        return view('admin.accountsExtras.show', compact('accountsExtra'));
    }

    public function destroy(AccountsExtra $accountsExtra): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('accounts_extra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountsExtra->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountsExtraRequest $request): \Illuminate\Http\Response
    {
        AccountsExtra::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
