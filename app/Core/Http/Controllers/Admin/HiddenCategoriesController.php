<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHiddenCategoryRequest;
use App\Http\Requests\StoreHiddenCategoryRequest;
use App\Http\Requests\UpdateHiddenCategoryRequest;
use App\Models\Category;
use App\Models\HiddenCategory;
use Domains\Users\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HiddenCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hidden_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiddenCategories = HiddenCategory::with(['category', 'user'])->get();

        return view('admin.hiddenCategories.index', compact('hiddenCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('hidden_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hiddenCategories.create', compact('categories', 'users'));
    }

    public function store(StoreHiddenCategoryRequest $request)
    {
        $hiddenCategory = HiddenCategory::create($request->all());

        return redirect()->route('admin.hidden-categories.index');
    }

    public function edit(HiddenCategory $hiddenCategory)
    {
        abort_if(Gate::denies('hidden_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hiddenCategory->load('category', 'user');

        return view('admin.hiddenCategories.edit', compact('categories', 'users', 'hiddenCategory'));
    }

    public function update(UpdateHiddenCategoryRequest $request, HiddenCategory $hiddenCategory)
    {
        $hiddenCategory->update($request->all());

        return redirect()->route('admin.hidden-categories.index');
    }

    public function show(HiddenCategory $hiddenCategory)
    {
        abort_if(Gate::denies('hidden_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiddenCategory->load('category', 'user');

        return view('admin.hiddenCategories.show', compact('hiddenCategory'));
    }

    public function destroy(HiddenCategory $hiddenCategory)
    {
        abort_if(Gate::denies('hidden_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiddenCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyHiddenCategoryRequest $request)
    {
        HiddenCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
