<?php

namespace Domains\AutoBrands\Http\Controllers\Admin;

use Domains\AutoBrands\Actions\GetAllAutoBrandsAction;
use Domains\AutoBrands\Actions\StoreAutoBrandAction;
use Domains\AutoBrands\DataTransferObjects\AutoBrandData;
use Domains\AutoBrands\Http\Requests\CreateAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\DeleteAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\IndexAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\ShowAutoBrandRequest;
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

    public function index(IndexAutoBrandRequest $request, GetAllAutoBrandsAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.autoBrands.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateAutoBrandRequest $request): \Illuminate\View\View
    {
        return view('admin.autoBrands.create');
    }

    public function store(StoreAutoBrandRequest $request, StoreAutoBrandAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(AutoBrandData::fromRequest($request));

        return redirect()->route('admin.auto-brands.index');
    }

    public function edit(AutoBrand $autoBrand): \Illuminate\View\View
    {
        return view('admin.autoBrands.edit', compact('autoBrand'));
    }

    public function update(UpdateAutoBrandRequest $request, AutoBrand $autoBrand): \Illuminate\Http\RedirectResponse
    {
        $autoBrand->update($request->all());

        return redirect()->route('admin.auto-brands.index');
    }

    public function show(ShowAutoBrandRequest $request, AutoBrand $autoBrand): \Illuminate\View\View
    {
        return view('admin.autoBrands.show', compact('autoBrand'));
    }

    public function destroy(DeleteAutoBrandRequest $request, AutoBrand $autoBrand): \Illuminate\Http\RedirectResponse
    {
        $autoBrand->delete();

        return back();
    }

    public function massDestroy(MassDestroyAutoBrandRequest $request): \Illuminate\Http\Response
    {
        AutoBrand::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
