<?php

namespace Domains\Countries\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Domains\Countries\Http\Requests\MassDestroyCountryRequest;
use Domains\Countries\Http\Requests\StoreCountryRequest;
use Domains\Countries\Http\Requests\UpdateCountryRequest;
use Domains\Countries\Models\Country;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();

        return view('frontend.countries.index', compact('countries'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('country_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.countries.create');
    }

    public function store(StoreCountryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $country = Country::create($request->all());

        return redirect()->route('frontend.countries.index');
    }

    public function edit(Country $country): \Illuminate\View\View
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.countries.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country): \Illuminate\Http\RedirectResponse
    {
        $country->update($request->all());

        return redirect()->route('frontend.countries.index');
    }

    public function show(Country $country): \Illuminate\View\View
    {
        abort_if(Gate::denies('country_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.countries.show', compact('country'));
    }

    public function destroy(Country $country): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('country_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->delete();

        return back();
    }

    public function massDestroy(MassDestroyCountryRequest $request): \Illuminate\Http\Response
    {
        Country::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
