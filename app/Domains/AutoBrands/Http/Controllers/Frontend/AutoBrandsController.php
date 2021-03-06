<?php

namespace Domains\AutoBrands\Http\Controllers\Frontend;

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

    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('auto_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autoBrands = AutoBrand::all();

        return view('frontend.autoBrands.index', compact('autoBrands'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('auto_brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.autoBrands.create');
    }

    public function store(StoreAutoBrandRequest $request): \Illuminate\Http\RedirectResponse
    {
        $autoBrand = AutoBrand::create($request->all());

        return redirect()->route('frontend.auto-brands.index');
    }

    public function edit(AutoBrand $autoBrand): \Illuminate\View\View
    {
        abort_if(Gate::denies('auto_brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.autoBrands.edit', compact('autoBrand'));
    }

    public function update(UpdateAutoBrandRequest $request, AutoBrand $autoBrand): \Illuminate\Http\RedirectResponse
    {
        $autoBrand->update($request->all());

        return redirect()->route('frontend.auto-brands.index');
    }

    public function show(AutoBrand $autoBrand): \Illuminate\View\View
    {
        abort_if(Gate::denies('auto_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.autoBrands.show', compact('autoBrand'));
    }

    public function destroy(AutoBrand $autoBrand): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('auto_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autoBrand->delete();

        return back();
    }

    public function massDestroy(MassDestroyAutoBrandRequest $request): \Illuminate\Http\Response
    {
        AutoBrand::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
