<?php

namespace Domains\Currencies\Http\Controllers\Api;

use Parents\Controllers\Controller;
use Domains\Currencies\Http\Requests\StoreCurrencyRequest;
use Domains\Currencies\Http\Requests\UpdateCurrencyRequest;
use Domains\Currencies\Http\Resources\CurrencyResource;
use Domains\Currencies\Models\Currency;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrenciesApiController extends Controller
{
    public function index(): CurrencyResource
    {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyResource(Currency::with(['users'])->get());
    }

    public function store(StoreCurrencyRequest $request): static
    {
        $currency = Currency::create($request->all());
        $currency->users()->sync($request->input('users', []));

        return (new CurrencyResource($currency))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Currency $currency): CurrencyResource
    {
        abort_if(Gate::denies('currency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyResource($currency->load(['users']));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency): static
    {
        $currency->update($request->all());
        $currency->users()->sync($request->input('users', []));

        return (new CurrencyResource($currency))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Currency $currency): \Illuminate\Http\Response
    {
        abort_if(Gate::denies('currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
