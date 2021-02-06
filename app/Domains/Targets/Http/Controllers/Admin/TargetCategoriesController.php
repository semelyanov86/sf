<?php

namespace Domains\Targets\Http\Controllers\Admin;

use Domains\Targets\Actions\GetAllTargetCategoriesAction;
use Domains\Targets\Actions\StoreTargetCategoryAction;
use Domains\Targets\Actions\UpdateTargetCategoryAction;
use Domains\Targets\DataTransferObjects\TargetCategoryData;
use Domains\Targets\Http\Requests\CreateTargetCategoryRequest;
use Domains\Targets\Http\Requests\DeleteTargetCategoryRequest;
use Domains\Targets\Http\Requests\EditTargetCategoryRequest;
use Domains\Targets\Http\Requests\IndexTargetCategoriesRequest;
use Domains\Targets\Http\Requests\ShowTargetCategoryRequest;
use Parents\Controllers\WebController as Controller;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Targets\Http\Requests\MassDestroyTargetCategoryRequest;
use Domains\Targets\Http\Requests\StoreTargetCategoryRequest;
use Domains\Targets\Http\Requests\UpdateTargetCategoryRequest;
use Domains\Targets\Models\TargetCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TargetCategoriesController extends Controller
{
    use MediaUploadingTrait;

    public function index(IndexTargetCategoriesRequest $request, GetAllTargetCategoriesAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.targetCategories.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateTargetCategoryRequest $request): \Illuminate\View\View
    {
        return view('admin.targetCategories.create');
    }

    public function store(StoreTargetCategoryRequest $request, StoreTargetCategoryAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(TargetCategoryData::fromRequest($request));

        return redirect()->route('admin.target-categories.index');
    }

    public function edit(EditTargetCategoryRequest $request, TargetCategory $targetCategory): \Illuminate\View\View
    {
        return view('admin.targetCategories.edit', compact('targetCategory'));
    }

    public function update(UpdateTargetCategoryRequest $request, TargetCategory $targetCategory, UpdateTargetCategoryAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($targetCategory, TargetCategoryData::fromRequest($request));

        return redirect()->route('admin.target-categories.index');
    }

    public function show(ShowTargetCategoryRequest $request, TargetCategory $targetCategory): \Illuminate\View\View
    {
        $targetCategory->load('targetCategoryTargets');

        return view('admin.targetCategories.show', compact('targetCategory'));
    }

    public function destroy(DeleteTargetCategoryRequest $request, TargetCategory $targetCategory): \Illuminate\Http\RedirectResponse
    {
        $targetCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyTargetCategoryRequest $request): \Illuminate\Http\Response
    {
        TargetCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request): \Illuminate\Http\JsonResponse
    {
        abort_if(Gate::denies('target_category_create') && Gate::denies('target_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TargetCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
