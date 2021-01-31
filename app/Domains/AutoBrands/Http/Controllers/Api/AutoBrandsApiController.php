<?php

namespace Domains\AutoBrands\Http\Controllers\Api;

use Domains\AutoBrands\Actions\GetAllAutoBrandsAction;
use Domains\AutoBrands\Actions\StoreAutoBrandAction;
use Domains\AutoBrands\Actions\UpdateAutoBrandAction;
use Domains\AutoBrands\DataTransferObjects\AutoBrandData;
use Domains\AutoBrands\Http\Requests\DeleteAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\IndexAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\ShowAutoBrandRequest;
use Domains\AutoBrands\Transformers\AutoBrandTransformer;
use Parents\Controllers\ApiController as Controller;
use Domains\AutoBrands\Http\Requests\StoreAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\UpdateAutoBrandRequest;
use Domains\AutoBrands\Models\AutoBrand;
use Symfony\Component\HttpFoundation\Response;

class AutoBrandsApiController extends Controller
{
    public function index(IndexAutoBrandRequest $request, GetAllAutoBrandsAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action()->autoBrands(), new AutoBrandTransformer())->respond();
    }

    public function store(StoreAutoBrandRequest $request, StoreAutoBrandAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(AutoBrandData::fromRequest($request));
        return fractal($viewModel->autoBrand(), new AutoBrandTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(ShowAutoBrandRequest $request, AutoBrand $autoBrand): \Illuminate\Http\JsonResponse
    {
        return fractal(AutoBrandData::fromModel($autoBrand), new AutoBrandTransformer())->respond();
    }

    public function update(UpdateAutoBrandRequest $request, AutoBrand $autoBrand, UpdateAutoBrandAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($autoBrand, AutoBrandData::fromRequest($request));
        return fractal($viewModel->autoBrand(), new AutoBrandTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteAutoBrandRequest $request, AutoBrand $autoBrand): \Illuminate\Http\Response
    {
        $autoBrand->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
