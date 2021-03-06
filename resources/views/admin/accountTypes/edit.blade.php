@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.accountType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.account-types.update", [$accountType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.accountType.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $accountType->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountType.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parent_description">{{ trans('cruds.accountType.fields.parent_description') }}</label>
                <input class="form-control {{ $errors->has('parent_description') ? 'is-invalid' : '' }}" type="text" name="parent_description" id="parent_description" value="{{ old('parent_description', $accountType->parent_description) }}">
                @if($errors->has('parent_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parent_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountType.fields.parent_description_helper') }}</span>
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