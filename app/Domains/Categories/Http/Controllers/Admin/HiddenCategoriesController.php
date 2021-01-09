<?php

namespace Domains\Categories\Http\Controllers\Admin;

use Parents\Controllers\WebController as Controller;
use Domains\Categories\Http\Requests\MassDestroyHiddenCategoryRequest;
use Domains\Categories\Http\Requests\StoreHiddenCategoryRequest;
use Domains\Categories\Http\Requests\UpdateHiddenCategoryRequest;
use Domains\Categories\Models\Category;
use Domains\Categories\Models\HiddenCategory;
use Domains\Users\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HiddenCategoriesController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        abort_if(Gate::denies('hidden_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiddenCategories = HiddenCategory::with(['category', 'user'])->get();

        return view('admin.hiddenCategories.index', compact('hiddenCategories'));
    }

    public function create(): \Illuminate\View\View
    {
        abort_if(Gate::denies('hidden_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hiddenCategories.create', compact('categories', 'users'));
    }

    public function store(StoreHiddenCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $hiddenCategory = HiddenCategory::create($request->all());

        return redirect()->route('admin.hidden-categories.index');
    }

    public function edit(HiddenCategory $hiddenCategory): \Illuminate\View\View
    {
        abort_if(Gate::denies('hidden_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hiddenCategory->load('category', 'user');

        return view('admin.hiddenCategories.edit', compact('categories', 'users', 'hiddenCategory'));
    }

    public function update(UpdateHiddenCategoryRequest $request, HiddenCategory $hiddenCategory): \Illuminate\Http\RedirectResponse
    {
        $hiddenCategory->update($request->all());

        return redirect()->route('admin.hidden-categories.index');
    }

    public function show(HiddenCategory $hiddenCategory): \Illuminate\View\View
    {
        abort_if(Gate::denies('hidden_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiddenCategory->load('category', 'user');

        return view('admin.hiddenCategories.show', compact('hiddenCategory'));
    }

    public function destroy(HiddenCategory $hiddenCategory): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies('hidden_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiddenCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyHiddenCategoryRequest $request): \Illuminate\Http\Response
    {
        HiddenCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
