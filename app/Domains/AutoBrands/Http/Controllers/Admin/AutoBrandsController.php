<?php

namespace Domains\AutoBrands\Http\Controllers\Admin;

use Parents\Controllers\WebController as Controller;
use Support\CsvImport\Traits\CsvImportTrait;
use Domains\AutoBrands\Http\Requests\MassDestroyAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\StoreAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\UpdateAutoBrandRequest;
use Domains\AutoBrands\Models\AutoBrand;
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

        return view('admin.autoBrands.index', compact('autoBrands'));
    }

    public function create()
    {
        abort_if(Gate::denies('auto_brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.autoBrands.create');
    }

    public function store(StoreAutoBrandRequest $request)
    {
        $autoBrand = AutoBrand::create($request->all());

        return redirect()->route('admin.auto-brands.index');
    }

    public function edit(AutoBrand $autoBrand)
    {
        abort_if(Gate::denies('auto_brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.autoBrands.edit', compact('autoBrand'));
    }

    public function update(UpdateAutoBrandRequest $request, AutoBrand $autoBrand)
    {
        $autoBrand->update($request->all());

        return redirect()->route('admin.auto-brands.index');
    }

    public function show(AutoBrand $autoBrand)
    {
        abort_if(Gate::denies('auto_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.autoBrands.show', compact('autoBrand'));
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
