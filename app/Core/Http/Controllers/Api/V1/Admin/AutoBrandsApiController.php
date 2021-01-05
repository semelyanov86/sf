<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\StoreAutoBrandRequest;
use App\Http\Controllers\Requests\UpdateAutoBrandRequest;
use App\Http\Controllers\Resources\Admin\AutoBrandResource;
use App\Models\AutoBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutoBrandsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('auto_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AutoBrandResource(AutoBrand::all());
    }

    public function store(StoreAutoBrandRequest $request)
    {
        $autoBrand = AutoBrand::create($request->all());

        return (new AutoBrandResource($autoBrand))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AutoBrand $autoBrand)
    {
        abort_if(Gate::denies('auto_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AutoBrandResource($autoBrand);
    }

    public function update(UpdateAutoBrandRequest $request, AutoBrand $autoBrand)
    {
        $autoBrand->update($request->all());

        return (new AutoBrandResource($autoBrand))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AutoBrand $autoBrand)
    {
        abort_if(Gate::denies('auto_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autoBrand->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
