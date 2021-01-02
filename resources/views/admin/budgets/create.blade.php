@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.budget.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.budgets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.budget.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.budget.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="plan">{{ trans('cruds.budget.fields.plan') }}</label>
                <input class="form-control {{ $errors->has('plan') ? 'is-invalid' : '' }}" type="number" name="plan" id="plan" value="{{ old('plan', '') }}" step="0.01" required>
                @if($errors->has('plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.budget.fields.plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.budget.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.budget.fields.user_helper') }}</span>
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