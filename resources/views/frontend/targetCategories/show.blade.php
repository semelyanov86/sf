@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.targetCategory.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.target-categories.index') }}">
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
                                        {{ $targetCategory->target_category_type ? \Domains\Targets\Enums\TypeSelectEnum::getValue($targetCategory->target_category_type)?->description : '' }}
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
                            <a class="btn btn-default" href="{{ route('frontend.target-categories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
