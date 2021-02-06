<?php

namespace Domains\Targets\Http\Controllers\Api;

use Domains\Targets\Actions\GetAllTargetCategoriesAction;
use Domains\Targets\Actions\StoreTargetCategoryAction;
use Domains\Targets\Actions\UpdateTargetCategoryAction;
use Domains\Targets\DataTransferObjects\TargetCategoryData;
use Domains\Targets\Http\Requests\DeleteTargetCategoryRequest;
use Domains\Targets\Http\Requests\IndexTargetCategoriesRequest;
use Domains\Targets\Http\Requests\ShowTargetCategoryRequest;
use Domains\Targets\Transformers\TargetCategoryTransformer;
use Parents\Controllers\ApiController as Controller;
use Support\MediaUpload\Traits\MediaUploadingTrait;
use Domains\Targets\Http\Requests\StoreTargetCategoryRequest;
use Domains\Targets\Http\Requests\UpdateTargetCategoryRequest;
use Domains\Targets\Models\TargetCategory;
use Symfony\Component\HttpFoundation\Response;

class TargetCategoriesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index(IndexTargetCategoriesRequest $request, GetAllTargetCategoriesAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action();
        return fractal($viewModel->targetCategories(), new TargetCategoryTransformer())->respond();
    }

    public function store(StoreTargetCategoryRequest $request, StoreTargetCategoryAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(TargetCategoryData::fromRequest($request));
        return fractal($viewModel->targetCategory(), new TargetCategoryTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(ShowTargetCategoryRequest $request, TargetCategory $targetCategory): \Illuminate\Http\JsonResponse
    {
        return fractal(TargetCategoryData::fromModel($targetCategory), new TargetCategoryTransformer())->respond();
    }

    public function update(UpdateTargetCategoryRequest $request, TargetCategory $targetCategory, UpdateTargetCategoryAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($targetCategory, TargetCategoryData::fromRequest($request));
        return fractal($viewModel->targetCategory(), new TargetCategoryTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteTargetCategoryRequest $request, TargetCategory $targetCategory): \Illuminate\Http\Response
    {
        $targetCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
