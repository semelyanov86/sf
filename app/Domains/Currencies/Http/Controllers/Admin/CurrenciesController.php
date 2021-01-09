<?php

namespace Domains\Currencies\Http\Controllers\Admin;

use Parents\Controllers\Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\Currencies\Http\Requests\MassDestroyCurrencyRequest;
use Domains\Currencies\Http\Requests\StoreCurrencyRequest;
use Domains\Currencies\Http\Requests\UpdateCurrencyRequest;
use Domains\Currencies\Models\Currency;
use Domains\Users\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrenciesController extends Controller
{
    use CsvImportTrait;

    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::with(['users'])->get();

        return view('admin.currencies.index', compact('currencies'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('currency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        return view('admin.currencies.create', compact('users'));
    }

    public function store(StoreCurrencyRequest $request): \Illuminate\Http\RedirectResponse
    {
        $currency = Currency::create($request->all());
        $currency->users()->sync($request->input('users', []));

        return redirect()->route('admin.currencies.index');
    }

    public function edit(Currency $currency): \Illuminate\View\View
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        $currency->load('users');

        return view('admin.currencies.edit', compact('users', 'currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency): \Illuminate\Http\RedirectResponse
    {
        $currency->update($request->all());
        $currency->users()->sync($request->input('users', []));

        return redirect()->route('admin.currencies.index');
    }

    public function show(Currency $currency): \Illuminate\View\View
    {
        abort_if(Gate::denies('currency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->load('users');

        return view('admin.currencies.show', compact('currency'));
    }

    public function destroy(Currency $currency): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyRequest $request): \Illuminate\Http\Response
    {
        Currency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
