<?php

namespace Domains\Targets\Http\Controllers\Api;

use Parents\Controllers\ApiController as Controller;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Targets\Http\Requests\StoreTargetCategoryRequest;
use Domains\Targets\Http\Requests\UpdateTargetCategoryRequest;
use Domains\Targets\Http\Resources\TargetCategoryResource;
use Domains\Targets\Models\TargetCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TargetCategoriesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('target_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TargetCategoryResource(TargetCategory::all());
    }

    public function store(StoreTargetCategoryRequest $request)
    {
        $targetCategory = TargetCategory::create($request->all());

        if ($request->input('target_category_image', false)) {
            $targetCategory->addMedia(storage_path('tmp/uploads/' . $request->input('target_category_image')))->toMediaCollection('target_category_image');
        }

        return (new TargetCategoryResource($targetCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TargetCategory $targetCategory)
    {
        abort_if(Gate::denies('target_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TargetCategoryResource($targetCategory);
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

        return (new TargetCategoryResource($targetCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TargetCategory $targetCategory)
    {
        abort_if(Gate::denies('target_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $targetCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
