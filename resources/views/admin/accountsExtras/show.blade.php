@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.accountsExtra.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accounts-extras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.id') }}
                        </th>
                        <td>
                            {{ $accountsExtra->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_type') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_expire_date') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_expire_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_year_cost') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_year_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_rate_balance') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_rate_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_atm_commission') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_atm_commission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_other_atm_commission') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_other_atm_commission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_credit_limit') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_credit_limit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_credit_interest_rate') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_credit_interest_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_credit_grace_period') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_credit_grace_period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_credit_min_payment_percent') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_credit_min_payment_percent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_credit_min_payment_day') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_credit_min_payment_day }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.card_credit_annual_service_cost') }}
                        </th>
                        <td>
                            {{ $accountsExtra->card_credit_annual_service_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_open_date') }}
                        </th>
                        <td>
                            {{ $accountsExtra->account_open_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_interest_rate') }}
                        </th>
                        <td>
                            {{ $accountsExtra->account_interest_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_close_date') }}
                        </th>
                        <td>
                            {{ $accountsExtra->account_close_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_is_capitalization') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $accountsExtra->account_is_capitalization ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_interest_period') }}
                        </th>
                        <td>
                            {{ Domains\Accounts\Models\AccountsExtra::ACCOUNT_INTEREST_PERIOD_SELECT[$accountsExtra->account_interest_period] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_deposit_type') }}
                        </th>
                        <td>
                            {{ Domains\Accounts\Models\AccountsExtra::ACCOUNT_DEPOSIT_TYPE_SELECT[$accountsExtra->account_deposit_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_credit_payment_type') }}
                        </th>
                        <td>
                            {{ Domains\Accounts\Models\AccountsExtra::ACCOUNT_CREDIT_PAYMENT_TYPE_SELECT[$accountsExtra->account_credit_payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_credit_one_time_commission') }}
                        </th>
                        <td>
                            {{ $accountsExtra->account_credit_one_time_commission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_credit_monthly_commission') }}
                        </th>
                        <td>
                            {{ $accountsExtra->account_credit_monthly_commission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.account_credit_payment_day') }}
                        </th>
                        <td>
                            {{ $accountsExtra->account_credit_payment_day }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.loan_give_date') }}
                        </th>
                        <td>
                            {{ $accountsExtra->loan_give_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.loan_take_date') }}
                        </th>
                        <td>
                            {{ $accountsExtra->loan_take_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.loan_debitor_email') }}
                        </th>
                        <td>
                            {{ $accountsExtra->loan_debitor_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.loan_debitor_phone') }}
                        </th>
                        <td>
                            {{ $accountsExtra->loan_debitor_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.loan_interest_rate') }}
                        </th>
                        <td>
                            {{ $accountsExtra->loan_interest_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_estate_type') }}
                        </th>
                        <td>
                            {{ Domains\Accounts\Models\AccountsExtra::IMMOVABLES_ESTATE_TYPE_SELECT[$accountsExtra->immovables_estate_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_living_space') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_living_space }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_usable_space') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_usable_space }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_landing_plot') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_landing_plot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_distance_to_city') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_distance_to_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_floor') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_count_floor') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_count_floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_city') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_district') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.immovables_purchase_date') }}
                        </th>
                        <td>
                            {{ $accountsExtra->immovables_purchase_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_transport_type') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_transport_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_brand') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_model') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_modification') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_modification }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_fuel_type') }}
                        </th>
                        <td>
                            {{ Domains\Accounts\Models\AccountsExtra::AUTO_FUEL_TYPE_SELECT[$accountsExtra->auto_fuel_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_transmission_type') }}
                        </th>
                        <td>
                            {{ Domains\Accounts\Models\AccountsExtra::AUTO_TRANSMISSION_TYPE_SELECT[$accountsExtra->auto_transmission_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_color') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_year') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_engine_size') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_engine_size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_region') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_region }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_mileage') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_mileage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accountsExtra.fields.auto_purchase_date') }}
                        </th>
                        <td>
                            {{ $accountsExtra->auto_purchase_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accounts-extras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
