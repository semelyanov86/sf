<?php

namespace Domains\Countries\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domains\Countries\Http\Requests\StoreCountryRequest;
use Domains\Countries\Http\Requests\UpdateCountryRequest;
use Domains\Countries\Http\Resources\CountryResource;
use Domains\Countries\Models\Country;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CountriesApiController extends Controller
{
    public function index(): CountryResource
    {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CountryResource(Country::all());
    }

    public function store(StoreCountryRequest $request): \Illuminate\Http\JsonResponse
    {
        $country = Country::create($request->all());

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Country $country): CountryResource
    {
        abort_if(Gate::denies('country_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CountryResource($country);
    }

    public function update(UpdateCountryRequest $request, Country $country): \Illuminate\Http\JsonResponse
    {
        $country->update($request->all());

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Country $country): \Illuminate\Http\Response
    {
        abort_if(Gate::denies('country_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
