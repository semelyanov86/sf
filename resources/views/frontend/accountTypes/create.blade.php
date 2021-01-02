@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.accountType.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.account-types.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.accountType.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.accountType.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="parent_description">{{ trans('cruds.accountType.fields.parent_description') }}</label>
                            <input class="form-control" type="text" name="parent_description" id="parent_description" value="{{ old('parent_description', '') }}">
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

        </div>
    </div>
</div>
@endsection