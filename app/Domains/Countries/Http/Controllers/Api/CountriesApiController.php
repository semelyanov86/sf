<?php

namespace Domains\Countries\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domains\Countries\Actions\GetAllCountriesAction;
use Domains\Countries\Actions\StoreCountryAction;
use Domains\Countries\Actions\UpdateCountryAction;
use Domains\Countries\DataTransferObjects\CountryData;
use Domains\Countries\Http\Requests\DestroyCountryRequest;
use Domains\Countries\Http\Requests\IndexCountriesRequest;
use Domains\Countries\Http\Requests\ShowCountryRequest;
use Domains\Countries\Http\Requests\StoreCountryRequest;
use Domains\Countries\Http\Requests\UpdateCountryRequest;
use Domains\Countries\Http\Resources\CountryResource;
use Domains\Countries\Models\Country;
use Domains\Countries\Transformers\CountryTransformer;
use Gate;
use Parents\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;

class CountriesApiController extends ApiController
{
    public function index(IndexCountriesRequest $request, GetAllCountriesAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action();
        return fractal($viewModel->countries(), new CountryTransformer())->respond();
    }

    public function store(StoreCountryRequest $request, StoreCountryAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(CountryData::fromRequest($request));
        return fractal($viewModel->country(), new CountryTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(ShowCountryRequest $request, Country $country): \Illuminate\Http\JsonResponse
    {
        return fractal(CountryData::fromModel($country), new CountryTransformer())->respond();
    }

    public function update(UpdateCountryRequest $request, Country $country, UpdateCountryAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($country, CountryData::fromRequest($request));
        return fractal($viewModel->country(), new CountryTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DestroyCountryRequest $request, Country $country): \Illuminate\Http\Response
    {
        $country->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
