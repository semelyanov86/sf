@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.bank.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.banks.update", [$bank->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.bank.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $bank->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.bank.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $bank->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="country_id">{{ trans('cruds.bank.fields.country') }}</label>
                            <select class="form-control select2" name="country_id" id="country_id">
                                @foreach($countries as $id => $country)
                                    <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $bank->country->id ?? '') == $id ? 'selected' : '' }}>{{ $country }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.country_helper') }}</span>
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