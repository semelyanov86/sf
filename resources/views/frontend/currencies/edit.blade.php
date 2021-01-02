@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.currency.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.currencies.update", [$currency->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.currency.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $currency->code) }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="course">{{ trans('cruds.currency.fields.course') }}</label>
                            <input class="form-control" type="number" name="course" id="course" value="{{ old('course', $currency->course) }}" step="0.01">
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="update_date">{{ trans('cruds.currency.fields.update_date') }}</label>
                            <input class="form-control date" type="text" name="update_date" id="update_date" value="{{ old('update_date', $currency->update_date) }}">
                            @if($errors->has('update_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('update_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.update_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="users">{{ trans('cruds.currency.fields.users') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="users[]" id="users" multiple>
                                @foreach($users as $id => $users)
                                    <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || $currency->users->contains($id)) ? 'selected' : '' }}>{{ $users }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('users') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.users_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.currency.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $currency->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.name_helper') }}</span>
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