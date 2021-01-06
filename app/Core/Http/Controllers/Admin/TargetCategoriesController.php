<?php

namespace App\Http\Controllers\Admin;

use Parents\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTargetCategoryRequest;
use App\Http\Requests\StoreTargetCategoryRequest;
use App\Http\Requests\UpdateTargetCategoryRequest;
use App\Models\TargetCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TargetCategoriesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('target_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $targetCategories = TargetCategory::with(['media'])->get();

        return view('admin.targetCategories.index', compact('targetCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('target_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.targetCategories.create');
    }

    public function store(StoreTargetCategoryRequest $request)
    {
        $targetCategory = TargetCategory::create($request->all());

        if ($request->input('target_category_image', false)) {
            $targetCategory->addMedia(storage_path('tmp/uploads/' . $request->input('target_category_image')))->toMediaCollection('target_category_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $targetCategory->id]);
        }

        return redirect()->route('admin.target-categories.index');
    }

    public function edit(TargetCategory $targetCategory)
    {
        abort_if(Gate::denies('target_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.targetCategories.edit', compact('targetCategory'));
    }

    public function update(UpdateTargetCategoryRequest $request, TargetCategory $targetCategory)
    {
        $targetCategory->update($request->all());

        if ($request->input('target_category_image', false)) {
            if (!$targetCategory->target_category_image || $request->input('target_category_image') !== $targetCategory->target_category_image->file_name) {
                if ($targetCategory->target_category_image) {
                    $targetCategory->target_category_image->delete();
                }

                $targetCategory->addMedia(storage_path('tmp/uploads/' . $request->input('target_category_image')))->toMediaCollection('target_category_image');
            }
        } elseif ($targetCategory->target_category_image) {
            $targetCategory->target_category_image->delete();
        }

        return redirect()->route('admin.target-categories.index');
    }

    public function show(TargetCategory $targetCategory)
    {
        abort_if(Gate::denies('target_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $targetCategory->load('targetCategoryTargets');

        return view('admin.targetCategories.show', compact('targetCategory'));
    }

    public function destroy(TargetCategory $targetCategory)
    {
        abort_if(Gate::denies('target_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $targetCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyTargetCategoryRequest $request)
    {
        TargetCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('target_category_create') && Gate::denies('target_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TargetCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
