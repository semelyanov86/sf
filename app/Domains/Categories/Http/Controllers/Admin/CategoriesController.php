<?php

namespace Domains\Categories\Http\Controllers\Admin;

use Domains\Categories\Actions\GetAllCategoriesAction;
use Domains\Categories\Actions\StoreCategoryAction;
use Domains\Categories\Actions\UpdateCategoryAction;
use Domains\Categories\DataTransferObjects\CategoryData;
use Domains\Categories\Http\Requests\CreateCategoryRequest;
use Domains\Categories\Http\Requests\DeleteCategoryRequest;
use Domains\Categories\Http\Requests\EditCategoryRequest;
use Domains\Categories\Http\Requests\IndexCategoriesRequest;
use Domains\Categories\Http\Requests\ShowCategoryRequest;
use Parents\Controllers\WebController as Controller;
use Domains\Categories\Http\Requests\MassDestroyCategoryRequest;
use Domains\Categories\Http\Requests\StoreCategoryRequest;
use Domains\Categories\Http\Requests\UpdateCategoryRequest;
use Domains\Categories\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    public function index(IndexCategoriesRequest $request, GetAllCategoriesAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.categories.index', [
            'viewModel' => $action()
        ]);
    }

    public function create(CreateCategoryRequest $request): \Illuminate\View\View
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request, StoreCategoryAction $action): \Illuminate\Http\RedirectResponse
    {
        $action(CategoryData::fromRequest($request));

        return redirect()->route('admin.categories.index');
    }

    public function edit(EditCategoryRequest $request, Category $category): \Illuminate\View\View
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category, UpdateCategoryAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($category, CategoryData::fromRequest($request));

        return redirect()->route('admin.categories.index');
    }

    public function show(ShowCategoryRequest $request, Category $category): \Illuminate\View\View
    {
        $category->load('categoryBudgets', 'categoryOperations');

        return view('admin.categories.show', compact('category'));
    }

    public function destroy(DeleteCategoryRequest $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryRequest $request): \Illuminate\Http\Response
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
