<?php

namespace Domains\Currencies\Http\Controllers\Admin;

use Domains\Currencies\Actions\GetAllCurrenciesAction;
use Domains\Currencies\Actions\ShowCurrencyAction;
use Domains\Currencies\Actions\StoreCurrencyAction;
use Domains\Currencies\Actions\UpdateCurrencyAction;
use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Currencies\Http\Requests\CreateCurrencyRequest;
use Domains\Currencies\Http\Requests\DeleteCurrencyRequest;
use Domains\Currencies\Http\Requests\IndexCurrenciesRequest;
use Domains\Currencies\Http\Requests\ShowCurrencyRequest;
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

    public function index(IndexCurrenciesRequest $request, GetAllCurrenciesAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.currencies.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateCurrencyRequest $request): \Illuminate\View\View
    {
        $users = User::all()->pluck('name', 'id');

        return view('admin.currencies.create', compact('users'));
    }

    public function store(StoreCurrencyRequest $request, StoreCurrencyAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(CurrencyData::fromRequest($request), $request->input('users', []));

        return redirect()->route('admin.currencies.index');
    }

    public function edit(Currency $currency): \Illuminate\View\View
    {
        $users = User::all()->pluck('name', 'id');

        $currency->load('users');

        return view('admin.currencies.edit', compact('users', 'currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency, UpdateCurrencyAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($currency, CurrencyData::fromRequest($request), $request->input('users', []));
        
        return redirect()->route('admin.currencies.index');
    }

    public function show(ShowCurrencyRequest $request, Currency $currency, ShowCurrencyAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.currencies.show', [
            'viewModel' => $action($currency)
        ]);
    }

    public function destroy(DeleteCurrencyRequest $request, Currency $currency): \Illuminate\Http\RedirectResponse
    {
        $currency->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyRequest $request): \Illuminate\Http\Response
    {
        Currency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
