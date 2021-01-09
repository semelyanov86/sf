<?php

namespace Domains\AutoBrands\Http\Controllers\Api;

use Parents\Controllers\ApiController as Controller;
use Domains\AutoBrands\Http\Requests\StoreAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\UpdateAutoBrandRequest;
use Domains\AutoBrands\Http\Resources\AutoBrandResource;
use Domains\AutoBrands\Models\AutoBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutoBrandsApiController extends Controller
{
    public function index(): AutoBrandResource
    {
        abort_if(Gate::denies('auto_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AutoBrandResource(AutoBrand::all());
    }

    public function store(StoreAutoBrandRequest $request): static
    {
        $autoBrand = AutoBrand::create($request->all());

        return (new AutoBrandResource($autoBrand))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AutoBrand $autoBrand): AutoBrandResource
    {
        abort_if(Gate::denies('auto_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AutoBrandResource($autoBrand);
    }

    public function update(UpdateAutoBrandRequest $request, AutoBrand $autoBrand): static
    {
        $autoBrand->update($request->all());

        return (new AutoBrandResource($autoBrand))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AutoBrand $autoBrand): \Illuminate\Http\Response
    {
        abort_if(Gate::denies('auto_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autoBrand->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
