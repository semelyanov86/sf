<?php

namespace Domains\Countries\Http\Controllers\Admin;

use Domains\Countries\Actions\GetAllCountriesAction;
use Domains\Countries\Actions\StoreCountryAction;
use Domains\Countries\Actions\UpdateCountryAction;
use Domains\Countries\DataTransferObjects\CountryData;
use Domains\Countries\Http\Requests\CreateCountryRequest;
use Domains\Countries\Http\Requests\IndexCountriesRequest;
use Parents\Controllers\WebController as Controller;
use Domains\Countries\Http\Requests\MassDestroyCountryRequest;
use Domains\Countries\Http\Requests\StoreCountryRequest;
use Domains\Countries\Http\Requests\UpdateCountryRequest;
use Domains\Countries\Models\Country;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller
{
    public function index(IndexCountriesRequest $request, GetAllCountriesAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.countries.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateCountryRequest $request): \Illuminate\View\View
    {
        return view('admin.countries.create');
    }

    public function store(StoreCountryRequest $request, StoreCountryAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(CountryData::fromRequest($request));

        return redirect()->route('admin.countries.index');
    }

    public function edit(Country $country): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country, UpdateCountryAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($country, CountryData::fromRequest($request));

        return redirect()->route('admin.countries.index');
    }

    public function show(Country $country): \Illuminate\View\View
    {
        $country->load('countryBanks');

        return view('admin.countries.show', compact('country'));
    }

    public function destroy(Country $country): \Illuminate\Http\RedirectResponse
    {
        $country->delete();

        return back();
    }

    public function massDestroy(MassDestroyCountryRequest $request): \Illuminate\Http\Response
    {
        Country::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
