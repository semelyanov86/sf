<?php

namespace App\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAutoBrandRequest;
use App\Http\Requests\StoreAutoBrandRequest;
use App\Http\Requests\UpdateAutoBrandRequest;
use App\Models\AutoBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutoBrandsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('auto_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autoBrands = AutoBrand::all();

        return view('frontend.autoBrands.index', compact('autoBrands'));
    }

    public function create()
    {
        abort_if(Gate::denies('auto_brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.autoBrands.create');
    }

    public function store(StoreAutoBrandRequest $request)
    {
        $autoBrand = AutoBrand::create($request->all());

        return redirect()->route('frontend.auto-brands.index');
    }

    public function edit(AutoBrand $autoBrand)
    {
        abort_if(Gate::denies('auto_brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.autoBrands.edit', compact('autoBrand'));
    }

    public function update(UpdateAutoBrandRequest $request, AutoBrand $autoBrand)
    {
        $autoBrand->update($request->all());

        return redirect()->route('frontend.auto-brands.index');
    }

    public function show(AutoBrand $autoBrand)
    {
        abort_if(Gate::denies('auto_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.autoBrands.show', compact('autoBrand'));
    }

    public function destroy(AutoBrand $autoBrand)
    {
        abort_if(Gate::denies('auto_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autoBrand->delete();

        return back();
    }

    public function massDestroy(MassDestroyAutoBrandRequest $request)
    {
        AutoBrand::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
