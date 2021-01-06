<?php

namespace App\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAccountsExtraRequest;
use App\Http\Requests\StoreAccountsExtraRequest;
use App\Http\Requests\UpdateAccountsExtraRequest;
use App\Models\AccountsExtra;
use Domains\AutoBrands\Models\AutoBrand;
use App\Models\CardType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountsExtraController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('accounts_extra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountsExtras = AccountsExtra::with(['card_type', 'auto_brand', 'team'])->get();

        return view('frontend.accountsExtras.index', compact('accountsExtras'));
    }

    public function create()
    {
        abort_if(Gate::denies('accounts_extra_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $card_types = CardType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auto_brands = AutoBrand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.accountsExtras.create', compact('card_types', 'auto_brands'));
    }

    public function store(StoreAccountsExtraRequest $request)
    {
        $accountsExtra = AccountsExtra::create($request->all());

        return redirect()->route('frontend.accounts-extras.index');
    }

    public function edit(AccountsExtra $accountsExtra)
    {
        abort_if(Gate::denies('accounts_extra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $card_types = CardType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auto_brands = AutoBrand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accountsExtra->load('card_type', 'auto_brand', 'team');

        return view('frontend.accountsExtras.edit', compact('card_types', 'auto_brands', 'accountsExtra'));
    }

    public function update(UpdateAccountsExtraRequest $request, AccountsExtra $accountsExtra)
    {
        $accountsExtra->update($request->all());

        return redirect()->route('frontend.accounts-extras.index');
    }

    public function show(AccountsExtra $accountsExtra)
    {
        abort_if(Gate::denies('accounts_extra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountsExtra->load('card_type', 'auto_brand', 'team');

        return view('frontend.accountsExtras.show', compact('accountsExtra'));
    }

    public function destroy(AccountsExtra $accountsExtra)
    {
        abort_if(Gate::denies('accounts_extra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountsExtra->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountsExtraRequest $request)
    {
        AccountsExtra::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
