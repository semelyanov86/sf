<?php

namespace Domains\Currencies\Http\Controllers\Api;

use Domains\Currencies\Actions\GetAllCurrenciesAction;
use Domains\Currencies\Actions\ShowCurrencyAction;
use Domains\Currencies\Actions\StoreCurrencyAction;
use Domains\Currencies\Actions\UpdateCurrencyAction;
use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Currencies\Http\Requests\DeleteCurrencyRequest;
use Domains\Currencies\Http\Requests\IndexCurrenciesRequest;
use Domains\Currencies\Http\Requests\ShowCurrencyRequest;
use Domains\Currencies\Transformers\CurrencyTransformer;
use Parents\Controllers\Controller;
use Domains\Currencies\Http\Requests\StoreCurrencyRequest;
use Domains\Currencies\Http\Requests\UpdateCurrencyRequest;
use Domains\Currencies\Http\Resources\CurrencyResource;
use Domains\Currencies\Models\Currency;
use Symfony\Component\HttpFoundation\Response;

class CurrenciesApiController extends Controller
{
    public function index(IndexCurrenciesRequest $request, GetAllCurrenciesAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action()->currencies(), new CurrencyTransformer())->respond();
    }

    public function store(StoreCurrencyRequest $request, StoreCurrencyAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(CurrencyData::fromRequest($request), $request->input('users', []));
        return fractal($viewModel->currency(), new CurrencyTransformer())->parseIncludes(['users'])->respond(Response::HTTP_CREATED);
    }

    public function show(ShowCurrencyRequest $request, Currency $currency, ShowCurrencyAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action($currency)->currency(), new CurrencyTransformer())->respond();
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency, UpdateCurrencyAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($currency, CurrencyData::fromRequest($request), $request->input('users', []));
        return fractal($viewModel->currency(), new CurrencyTransformer())->parseIncludes(['users'])->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteCurrencyRequest $request, Currency $currency): \Illuminate\Http\Response
    {
        $currency->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
