<?php

namespace Domains\Categories\Http\Controllers\Admin;

use Parents\Controllers\WebController as Controller;
use Domains\Categories\Http\Requests\MassDestroyCategoryRequest;
use Domains\Categories\Http\Requests\StoreCategoryRequest;
use Domains\Categories\Http\Requests\UpdateCategoryRequest;
use Domains\Categories\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category): \Illuminate\View\View
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category): \Illuminate\View\View
    {
        abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->load('categoryBudgets', 'categoryOperations');

        return view('admin.categories.show', compact('category'));
    }

    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryRequest $request): \Illuminate\Http\Response
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
