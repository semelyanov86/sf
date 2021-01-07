@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.accountsExtra.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.accounts-extras.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="card_type_id">{{ trans('cruds.accountsExtra.fields.card_type') }}</label>
                <select class="form-control select2 {{ $errors->has('card_type') ? 'is-invalid' : '' }}" name="card_type_id" id="card_type_id">
                    @foreach($card_types as $id => $card_type)
                        <option value="{{ $id }}" {{ old('card_type_id') == $id ? 'selected' : '' }}>{{ $card_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('card_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_expire_date">{{ trans('cruds.accountsExtra.fields.card_expire_date') }}</label>
                <input class="form-control date {{ $errors->has('card_expire_date') ? 'is-invalid' : '' }}" type="text" name="card_expire_date" id="card_expire_date" value="{{ old('card_expire_date') }}">
                @if($errors->has('card_expire_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_expire_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_expire_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_year_cost">{{ trans('cruds.accountsExtra.fields.card_year_cost') }}</label>
                <input class="form-control {{ $errors->has('card_year_cost') ? 'is-invalid' : '' }}" type="number" name="card_year_cost" id="card_year_cost" value="{{ old('card_year_cost', '') }}" step="0.01">
                @if($errors->has('card_year_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_year_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_year_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_rate_balance">{{ trans('cruds.accountsExtra.fields.card_rate_balance') }}</label>
                <input class="form-control {{ $errors->has('card_rate_balance') ? 'is-invalid' : '' }}" type="number" name="card_rate_balance" id="card_rate_balance" value="{{ old('card_rate_balance', '') }}" step="0.01">
                @if($errors->has('card_rate_balance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_rate_balance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_rate_balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_atm_commission">{{ trans('cruds.accountsExtra.fields.card_atm_commission') }}</label>
                <input class="form-control {{ $errors->has('card_atm_commission') ? 'is-invalid' : '' }}" type="number" name="card_atm_commission" id="card_atm_commission" value="{{ old('card_atm_commission', '') }}" step="0.01">
                @if($errors->has('card_atm_commission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_atm_commission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_atm_commission_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_other_atm_commission">{{ trans('cruds.accountsExtra.fields.card_other_atm_commission') }}</label>
                <input class="form-control {{ $errors->has('card_other_atm_commission') ? 'is-invalid' : '' }}" type="number" name="card_other_atm_commission" id="card_other_atm_commission" value="{{ old('card_other_atm_commission', '') }}" step="0.01">
                @if($errors->has('card_other_atm_commission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_other_atm_commission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_other_atm_commission_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_credit_limit">{{ trans('cruds.accountsExtra.fields.card_credit_limit') }}</label>
                <input class="form-control {{ $errors->has('card_credit_limit') ? 'is-invalid' : '' }}" type="number" name="card_credit_limit" id="card_credit_limit" value="{{ old('card_credit_limit', '') }}" step="0.01">
                @if($errors->has('card_credit_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_credit_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_credit_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_credit_interest_rate">{{ trans('cruds.accountsExtra.fields.card_credit_interest_rate') }}</label>
                <input class="form-control {{ $errors->has('card_credit_interest_rate') ? 'is-invalid' : '' }}" type="number" name="card_credit_interest_rate" id="card_credit_interest_rate" value="{{ old('card_credit_interest_rate', '') }}" step="0.01">
                @if($errors->has('card_credit_interest_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_credit_interest_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_credit_interest_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_credit_grace_period">{{ trans('cruds.accountsExtra.fields.card_credit_grace_period') }}</label>
                <input class="form-control {{ $errors->has('card_credit_grace_period') ? 'is-invalid' : '' }}" type="number" name="card_credit_grace_period" id="card_credit_grace_period" value="{{ old('card_credit_grace_period', '') }}" step="1">
                @if($errors->has('card_credit_grace_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_credit_grace_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_credit_grace_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_credit_min_payment_percent">{{ trans('cruds.accountsExtra.fields.card_credit_min_payment_percent') }}</label>
                <input class="form-control {{ $errors->has('card_credit_min_payment_percent') ? 'is-invalid' : '' }}" type="number" name="card_credit_min_payment_percent" id="card_credit_min_payment_percent" value="{{ old('card_credit_min_payment_percent', '') }}" step="0.01">
                @if($errors->has('card_credit_min_payment_percent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_credit_min_payment_percent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_credit_min_payment_percent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_credit_min_payment_day">{{ trans('cruds.accountsExtra.fields.card_credit_min_payment_day') }}</label>
                <input class="form-control {{ $errors->has('card_credit_min_payment_day') ? 'is-invalid' : '' }}" type="number" name="card_credit_min_payment_day" id="card_credit_min_payment_day" value="{{ old('card_credit_min_payment_day', '') }}" step="1">
                @if($errors->has('card_credit_min_payment_day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_credit_min_payment_day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_credit_min_payment_day_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="card_credit_annual_service_cost">{{ trans('cruds.accountsExtra.fields.card_credit_annual_service_cost') }}</label>
                <input class="form-control {{ $errors->has('card_credit_annual_service_cost') ? 'is-invalid' : '' }}" type="number" name="card_credit_annual_service_cost" id="card_credit_annual_service_cost" value="{{ old('card_credit_annual_service_cost', '') }}" step="0.01">
                @if($errors->has('card_credit_annual_service_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_credit_annual_service_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.card_credit_annual_service_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_open_date">{{ trans('cruds.accountsExtra.fields.account_open_date') }}</label>
                <input class="form-control date {{ $errors->has('account_open_date') ? 'is-invalid' : '' }}" type="text" name="account_open_date" id="account_open_date" value="{{ old('account_open_date') }}">
                @if($errors->has('account_open_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_open_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_open_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_interest_rate">{{ trans('cruds.accountsExtra.fields.account_interest_rate') }}</label>
                <input class="form-control {{ $errors->has('account_interest_rate') ? 'is-invalid' : '' }}" type="number" name="account_interest_rate" id="account_interest_rate" value="{{ old('account_interest_rate', '') }}" step="0.01">
                @if($errors->has('account_interest_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_interest_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_interest_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_close_date">{{ trans('cruds.accountsExtra.fields.account_close_date') }}</label>
                <input class="form-control date {{ $errors->has('account_close_date') ? 'is-invalid' : '' }}" type="text" name="account_close_date" id="account_close_date" value="{{ old('account_close_date') }}">
                @if($errors->has('account_close_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_close_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_close_date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('account_is_capitalization') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="account_is_capitalization" value="0">
                    <input class="form-check-input" type="checkbox" name="account_is_capitalization" id="account_is_capitalization" value="1" {{ old('account_is_capitalization', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="account_is_capitalization">{{ trans('cruds.accountsExtra.fields.account_is_capitalization') }}</label>
                </div>
                @if($errors->has('account_is_capitalization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_is_capitalization') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_is_capitalization_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.accountsExtra.fields.account_interest_period') }}</label>
                <select class="form-control {{ $errors->has('account_interest_period') ? 'is-invalid' : '' }}" name="account_interest_period" id="account_interest_period">
                    <option value disabled {{ old('account_interest_period', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Domains\Accounts\Models\AccountsExtra::ACCOUNT_INTEREST_PERIOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('account_interest_period', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_interest_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_interest_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_interest_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.accountsExtra.fields.account_deposit_type') }}</label>
                <select class="form-control {{ $errors->has('account_deposit_type') ? 'is-invalid' : '' }}" name="account_deposit_type" id="account_deposit_type">
                    <option value disabled {{ old('account_deposit_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Domains\Accounts\Models\AccountsExtra::ACCOUNT_DEPOSIT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('account_deposit_type', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_deposit_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_deposit_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_deposit_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.accountsExtra.fields.account_credit_payment_type') }}</label>
                <select class="form-control {{ $errors->has('account_credit_payment_type') ? 'is-invalid' : '' }}" name="account_credit_payment_type" id="account_credit_payment_type">
                    <option value disabled {{ old('account_credit_payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Domains\Accounts\Models\AccountsExtra::ACCOUNT_CREDIT_PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('account_credit_payment_type', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_credit_payment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_credit_payment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_credit_payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_credit_one_time_commission">{{ trans('cruds.accountsExtra.fields.account_credit_one_time_commission') }}</label>
                <input class="form-control {{ $errors->has('account_credit_one_time_commission') ? 'is-invalid' : '' }}" type="number" name="account_credit_one_time_commission" id="account_credit_one_time_commission" value="{{ old('account_credit_one_time_commission', '') }}" step="0.01">
                @if($errors->has('account_credit_one_time_commission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_credit_one_time_commission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_credit_one_time_commission_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_credit_monthly_commission">{{ trans('cruds.accountsExtra.fields.account_credit_monthly_commission') }}</label>
                <input class="form-control {{ $errors->has('account_credit_monthly_commission') ? 'is-invalid' : '' }}" type="number" name="account_credit_monthly_commission" id="account_credit_monthly_commission" value="{{ old('account_credit_monthly_commission', '') }}" step="0.01">
                @if($errors->has('account_credit_monthly_commission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_credit_monthly_commission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_credit_monthly_commission_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_credit_payment_day">{{ trans('cruds.accountsExtra.fields.account_credit_payment_day') }}</label>
                <input class="form-control {{ $errors->has('account_credit_payment_day') ? 'is-invalid' : '' }}" type="number" name="account_credit_payment_day" id="account_credit_payment_day" value="{{ old('account_credit_payment_day', '') }}" step="1">
                @if($errors->has('account_credit_payment_day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_credit_payment_day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.account_credit_payment_day_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loan_give_date">{{ trans('cruds.accountsExtra.fields.loan_give_date') }}</label>
                <input class="form-control date {{ $errors->has('loan_give_date') ? 'is-invalid' : '' }}" type="text" name="loan_give_date" id="loan_give_date" value="{{ old('loan_give_date') }}">
                @if($errors->has('loan_give_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_give_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.loan_give_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loan_take_date">{{ trans('cruds.accountsExtra.fields.loan_take_date') }}</label>
                <input class="form-control date {{ $errors->has('loan_take_date') ? 'is-invalid' : '' }}" type="text" name="loan_take_date" id="loan_take_date" value="{{ old('loan_take_date') }}">
                @if($errors->has('loan_take_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_take_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.loan_take_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loan_debitor_email">{{ trans('cruds.accountsExtra.fields.loan_debitor_email') }}</label>
                <input class="form-control {{ $errors->has('loan_debitor_email') ? 'is-invalid' : '' }}" type="email" name="loan_debitor_email" id="loan_debitor_email" value="{{ old('loan_debitor_email') }}">
                @if($errors->has('loan_debitor_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_debitor_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.loan_debitor_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loan_debitor_phone">{{ trans('cruds.accountsExtra.fields.loan_debitor_phone') }}</label>
                <input class="form-control {{ $errors->has('loan_debitor_phone') ? 'is-invalid' : '' }}" type="text" name="loan_debitor_phone" id="loan_debitor_phone" value="{{ old('loan_debitor_phone', '') }}">
                @if($errors->has('loan_debitor_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_debitor_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.loan_debitor_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loan_interest_rate">{{ trans('cruds.accountsExtra.fields.loan_interest_rate') }}</label>
                <input class="form-control {{ $errors->has('loan_interest_rate') ? 'is-invalid' : '' }}" type="number" name="loan_interest_rate" id="loan_interest_rate" value="{{ old('loan_interest_rate', '') }}" step="0.01">
                @if($errors->has('loan_interest_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_interest_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.loan_interest_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.accountsExtra.fields.immovables_estate_type') }}</label>
                <select class="form-control {{ $errors->has('immovables_estate_type') ? 'is-invalid' : '' }}" name="immovables_estate_type" id="immovables_estate_type">
                    <option value disabled {{ old('immovables_estate_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Domains\Accounts\Models\AccountsExtra::IMMOVABLES_ESTATE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('immovables_estate_type', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('immovables_estate_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_estate_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_estate_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_living_space">{{ trans('cruds.accountsExtra.fields.immovables_living_space') }}</label>
                <input class="form-control {{ $errors->has('immovables_living_space') ? 'is-invalid' : '' }}" type="number" name="immovables_living_space" id="immovables_living_space" value="{{ old('immovables_living_space', '') }}" step="0.01">
                @if($errors->has('immovables_living_space'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_living_space') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_living_space_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_usable_space">{{ trans('cruds.accountsExtra.fields.immovables_usable_space') }}</label>
                <input class="form-control {{ $errors->has('immovables_usable_space') ? 'is-invalid' : '' }}" type="number" name="immovables_usable_space" id="immovables_usable_space" value="{{ old('immovables_usable_space', '') }}" step="0.01">
                @if($errors->has('immovables_usable_space'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_usable_space') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_usable_space_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_landing_plot">{{ trans('cruds.accountsExtra.fields.immovables_landing_plot') }}</label>
                <input class="form-control {{ $errors->has('immovables_landing_plot') ? 'is-invalid' : '' }}" type="number" name="immovables_landing_plot" id="immovables_landing_plot" value="{{ old('immovables_landing_plot', '') }}" step="0.01">
                @if($errors->has('immovables_landing_plot'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_landing_plot') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_landing_plot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_distance_to_city">{{ trans('cruds.accountsExtra.fields.immovables_distance_to_city') }}</label>
                <input class="form-control {{ $errors->has('immovables_distance_to_city') ? 'is-invalid' : '' }}" type="number" name="immovables_distance_to_city" id="immovables_distance_to_city" value="{{ old('immovables_distance_to_city', '') }}" step="0.01">
                @if($errors->has('immovables_distance_to_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_distance_to_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_distance_to_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_floor">{{ trans('cruds.accountsExtra.fields.immovables_floor') }}</label>
                <input class="form-control {{ $errors->has('immovables_floor') ? 'is-invalid' : '' }}" type="number" name="immovables_floor" id="immovables_floor" value="{{ old('immovables_floor', '') }}" step="1">
                @if($errors->has('immovables_floor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_floor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_floor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_count_floor">{{ trans('cruds.accountsExtra.fields.immovables_count_floor') }}</label>
                <input class="form-control {{ $errors->has('immovables_count_floor') ? 'is-invalid' : '' }}" type="number" name="immovables_count_floor" id="immovables_count_floor" value="{{ old('immovables_count_floor', '') }}" step="1">
                @if($errors->has('immovables_count_floor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_count_floor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_count_floor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_city">{{ trans('cruds.accountsExtra.fields.immovables_city') }}</label>
                <input class="form-control {{ $errors->has('immovables_city') ? 'is-invalid' : '' }}" type="text" name="immovables_city" id="immovables_city" value="{{ old('immovables_city', '') }}">
                @if($errors->has('immovables_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_district">{{ trans('cruds.accountsExtra.fields.immovables_district') }}</label>
                <input class="form-control {{ $errors->has('immovables_district') ? 'is-invalid' : '' }}" type="text" name="immovables_district" id="immovables_district" value="{{ old('immovables_district', '') }}">
                @if($errors->has('immovables_district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_district_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="immovables_purchase_date">{{ trans('cruds.accountsExtra.fields.immovables_purchase_date') }}</label>
                <input class="form-control date {{ $errors->has('immovables_purchase_date') ? 'is-invalid' : '' }}" type="text" name="immovables_purchase_date" id="immovables_purchase_date" value="{{ old('immovables_purchase_date') }}">
                @if($errors->has('immovables_purchase_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('immovables_purchase_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.immovables_purchase_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_transport_type">{{ trans('cruds.accountsExtra.fields.auto_transport_type') }}</label>
                <input class="form-control {{ $errors->has('auto_transport_type') ? 'is-invalid' : '' }}" type="text" name="auto_transport_type" id="auto_transport_type" value="{{ old('auto_transport_type', '') }}">
                @if($errors->has('auto_transport_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_transport_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_transport_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_brand_id">{{ trans('cruds.accountsExtra.fields.auto_brand') }}</label>
                <select class="form-control select2 {{ $errors->has('auto_brand') ? 'is-invalid' : '' }}" name="auto_brand_id" id="auto_brand_id">
                    @foreach($auto_brands as $id => $auto_brand)
                        <option value="{{ $id }}" {{ old('auto_brand_id') == $id ? 'selected' : '' }}>{{ $auto_brand }}</option>
                    @endforeach
                </select>
                @if($errors->has('auto_brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_model">{{ trans('cruds.accountsExtra.fields.auto_model') }}</label>
                <input class="form-control {{ $errors->has('auto_model') ? 'is-invalid' : '' }}" type="text" name="auto_model" id="auto_model" value="{{ old('auto_model', '') }}">
                @if($errors->has('auto_model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_modification">{{ trans('cruds.accountsExtra.fields.auto_modification') }}</label>
                <input class="form-control {{ $errors->has('auto_modification') ? 'is-invalid' : '' }}" type="text" name="auto_modification" id="auto_modification" value="{{ old('auto_modification', '') }}">
                @if($errors->has('auto_modification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_modification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_modification_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.accountsExtra.fields.auto_fuel_type') }}</label>
                <select class="form-control {{ $errors->has('auto_fuel_type') ? 'is-invalid' : '' }}" name="auto_fuel_type" id="auto_fuel_type">
                    <option value disabled {{ old('auto_fuel_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Domains\Accounts\Models\AccountsExtra::AUTO_FUEL_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('auto_fuel_type', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('auto_fuel_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_fuel_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_fuel_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.accountsExtra.fields.auto_transmission_type') }}</label>
                <select class="form-control {{ $errors->has('auto_transmission_type') ? 'is-invalid' : '' }}" name="auto_transmission_type" id="auto_transmission_type">
                    <option value disabled {{ old('auto_transmission_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Domains\Accounts\Models\AccountsExtra::AUTO_TRANSMISSION_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('auto_transmission_type', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('auto_transmission_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_transmission_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_transmission_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_color">{{ trans('cruds.accountsExtra.fields.auto_color') }}</label>
                <input class="form-control {{ $errors->has('auto_color') ? 'is-invalid' : '' }}" type="text" name="auto_color" id="auto_color" value="{{ old('auto_color', '') }}">
                @if($errors->has('auto_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_year">{{ trans('cruds.accountsExtra.fields.auto_year') }}</label>
                <input class="form-control {{ $errors->has('auto_year') ? 'is-invalid' : '' }}" type="number" name="auto_year" id="auto_year" value="{{ old('auto_year', '') }}" step="1">
                @if($errors->has('auto_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_engine_size">{{ trans('cruds.accountsExtra.fields.auto_engine_size') }}</label>
                <input class="form-control {{ $errors->has('auto_engine_size') ? 'is-invalid' : '' }}" type="number" name="auto_engine_size" id="auto_engine_size" value="{{ old('auto_engine_size', '') }}" step="0.01">
                @if($errors->has('auto_engine_size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_engine_size') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_engine_size_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_region">{{ trans('cruds.accountsExtra.fields.auto_region') }}</label>
                <input class="form-control {{ $errors->has('auto_region') ? 'is-invalid' : '' }}" type="text" name="auto_region" id="auto_region" value="{{ old('auto_region', '') }}">
                @if($errors->has('auto_region'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_region') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_region_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_mileage">{{ trans('cruds.accountsExtra.fields.auto_mileage') }}</label>
                <input class="form-control {{ $errors->has('auto_mileage') ? 'is-invalid' : '' }}" type="number" name="auto_mileage" id="auto_mileage" value="{{ old('auto_mileage', '') }}" step="0.01">
                @if($errors->has('auto_mileage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_mileage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_mileage_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auto_purchase_date">{{ trans('cruds.accountsExtra.fields.auto_purchase_date') }}</label>
                <input class="form-control date {{ $errors->has('auto_purchase_date') ? 'is-invalid' : '' }}" type="text" name="auto_purchase_date" id="auto_purchase_date" value="{{ old('auto_purchase_date') }}">
                @if($errors->has('auto_purchase_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('auto_purchase_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountsExtra.fields.auto_purchase_date_helper') }}</span>
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
