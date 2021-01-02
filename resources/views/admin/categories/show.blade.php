@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.category.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Category::TYPE_SELECT[$category->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.is_hidden') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $category->is_hidden ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.parent') }}
                        </th>
                        <td>
                            {{ $category->parent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.sys_category') }}
                        </th>
                        <td>
                            {{ $category->sys_category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.last_used_at') }}
                        </th>
                        <td>
                            {{ $category->last_used_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#category_budgets" role="tab" data-toggle="tab">
                {{ trans('cruds.budget.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#category_operations" role="tab" data-toggle="tab">
                {{ trans('cruds.operation.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="category_budgets">
            @includeIf('admin.categories.relationships.categoryBudgets', ['budgets' => $category->categoryBudgets])
        </div>
        <div class="tab-pane" role="tabpanel" id="category_operations">
            @includeIf('admin.categories.relationships.categoryOperations', ['operations' => $category->categoryOperations])
        </div>
    </div>
</div>

@endsection