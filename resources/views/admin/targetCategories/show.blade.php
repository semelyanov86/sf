@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.targetCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.target-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.targetCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $targetCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.targetCategory.fields.target_category_name') }}
                        </th>
                        <td>
                            {{ $targetCategory->target_category_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.targetCategory.fields.target_category_type') }}
                        </th>
                        <td>
                            {{ Domains\Targets\Models\TargetCategory::TARGET_CATEGORY_TYPE_SELECT[$targetCategory->target_category_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.targetCategory.fields.target_category_image') }}
                        </th>
                        <td>
                            @if($targetCategory->target_category_image)
                                <a href="{{ $targetCategory->target_category_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $targetCategory->target_category_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.target-categories.index') }}">
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
            <a class="nav-link" href="#target_category_targets" role="tab" data-toggle="tab">
                {{ trans('cruds.target.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="target_category_targets">
            @includeIf('admin.targetCategories.relationships.targetCategoryTargets', ['targets' => $targetCategory->targetCategoryTargets])
        </div>
    </div>
</div>

@endsection
