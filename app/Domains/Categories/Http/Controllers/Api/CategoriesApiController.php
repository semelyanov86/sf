<?php

namespace Domains\Categories\Http\Controllers\Api;

use Domains\Categories\Actions\GetAllCategoriesAction;
use Domains\Categories\Actions\StoreCategoryAction;
use Domains\Categories\Actions\UpdateCategoryAction;
use Domains\Categories\DataTransferObjects\CategoryData;
use Domains\Categories\Http\Requests\DeleteCategoryRequest;
use Domains\Categories\Http\Requests\IndexCategoriesRequest;
use Domains\Categories\Http\Requests\ShowCategoryRequest;
use Domains\Categories\Transformers\CategoryTransformer;
use Parents\Controllers\ApiController as Controller;
use Domains\Categories\Http\Requests\StoreCategoryRequest;
use Domains\Categories\Http\Requests\UpdateCategoryRequest;
use Domains\Http\Resources\CategoryResource;
use Domains\Categories\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesApiController extends Controller
{
    public function index(IndexCategoriesRequest $request, GetAllCategoriesAction $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action()->categories(), new CategoryTransformer())->respond();
    }

    public function store(StoreCategoryRequest $request, StoreCategoryAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action(CategoryData::fromRequest($request));
        return fractal($viewModel->category(), new CategoryTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(ShowCategoryRequest $request, Category $category): \Illuminate\Http\JsonResponse
    {
        return fractal(CategoryData::fromModel($category), new CategoryTransformer())->respond();
    }

    public function update(UpdateCategoryRequest $request, Category $category, UpdateCategoryAction $action): \Illuminate\Http\JsonResponse
    {
        $viewModel = $action($category, CategoryData::fromRequest($request));
        return fractal($viewModel->category(), new CategoryTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeleteCategoryRequest $request, Category $category): \Illuminate\Http\Response
    {
        $category->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
