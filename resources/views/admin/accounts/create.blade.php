@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.account.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.accounts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.account.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_type_id">{{ trans('cruds.account.fields.account_type') }}</label>
                <select class="form-control select2 {{ $errors->has('account_type') ? 'is-invalid' : '' }}" name="account_type_id" id="account_type_id">
                    @foreach($viewModel->accountTypes() as $id => $account_type)
                        <option value="{{ $id }}" {{ old('account_type_id') == $id ? 'selected' : '' }}>{{ $account_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.account_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.account.fields.state') }}</label>
                @foreach(\Domains\Accounts\Enums\AccountStateEnum::getInstances() as $key => $label)
                    <div class="form-check {{ $errors->has('state') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="state_{{ $label->value }}" name="state" value="{{ $label->value }}" {{ old('state', '0') === (string) $label->value ? 'checked' : '' }} required>
                        <label class="form-check-label" for="state_{{ $label->value }}">{{ $label->description }}</label>
                    </div>
                @endforeach
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.account.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_balance">{{ trans('cruds.account.fields.start_balance') }}</label>
                <input class="form-control {{ $errors->has('start_balance') ? 'is-invalid' : '' }}" type="number" name="start_balance" id="start_balance" value="{{ old('start_balance', '0') }}" step="0.01" required>
                @if($errors->has('start_balance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_balance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.start_balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency_id">{{ trans('cruds.account.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id">
                    @foreach($viewModel->currencies() as $id => $currency)
                        <option value="{{ $id }}" {{ old('currency_id') == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_id">{{ trans('cruds.account.fields.bank') }}</label>
                <select class="form-control select2 {{ $errors->has('bank') ? 'is-invalid' : '' }}" name="bank_id" id="bank_id">
                    @foreach($viewModel->banks() as $id => $bank)
                        <option value="{{ $id }}" {{ old('bank_id') == $id ? 'selected' : '' }}>{{ $bank }}</option>
                    @endforeach
                </select>
                @if($errors->has('bank'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="market_value">{{ trans('cruds.account.fields.market_value') }}</label>
                <input class="form-control {{ $errors->has('market_value') ? 'is-invalid' : '' }}" type="number" name="market_value" id="market_value" value="{{ old('market_value', '0') }}" step="0.01" required>
                @if($errors->has('market_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('market_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.market_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra_prefix">{{ trans('cruds.account.fields.extra_prefix') }}</label>
                <input class="form-control {{ $errors->has('extra_prefix') ? 'is-invalid' : '' }}" type="text" name="extra_prefix" id="extra_prefix" value="{{ old('extra_prefix', '') }}">
                @if($errors->has('extra_prefix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('extra_prefix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.extra_prefix_helper') }}</span>
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
