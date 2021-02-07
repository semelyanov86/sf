@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.update", [$category->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.category.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.category.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(\Domains\Categories\Enums\CategoryTypeEnum::getInstances() as $key => $label)
                        <option value="{{ $label->value }}" {{ old('type', $category->type) === (string) $label->value ? 'selected' : '' }}>{{ $label->description }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_hidden') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_hidden" value="0">
                    <input class="form-check-input" type="checkbox" name="is_hidden" id="is_hidden" value="1" {{ $category->is_hidden || old('is_hidden', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_hidden">{{ trans('cruds.category.fields.is_hidden') }}</label>
                </div>
                @if($errors->has('is_hidden'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_hidden') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.is_hidden_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parent">{{ trans('cruds.category.fields.parent') }}</label>
                <input class="form-control {{ $errors->has('parent') ? 'is-invalid' : '' }}" type="number" name="parent" id="parent" value="{{ old('parent', $category->parent) }}" step="1">
                @if($errors->has('parent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.parent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sys_category">{{ trans('cruds.category.fields.sys_category') }}</label>
                <input class="form-control {{ $errors->has('sys_category') ? 'is-invalid' : '' }}" type="number" name="sys_category" id="sys_category" value="{{ old('sys_category', $category->sys_category) }}" step="1">
                @if($errors->has('sys_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sys_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.sys_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_used_at">{{ trans('cruds.category.fields.last_used_at') }}</label>
                <input class="form-control datetime {{ $errors->has('last_used_at') ? 'is-invalid' : '' }}" type="text" name="last_used_at" id="last_used_at" value="{{ old('last_used_at', $category->last_used_at) }}">
                @if($errors->has('last_used_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_used_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.last_used_at_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
