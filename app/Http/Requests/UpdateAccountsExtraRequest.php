<?php

namespace App\Http\Requests;

use App\Models\AccountsExtra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccountsExtraRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('accounts_extra_edit');
    }

    public function rules()
    {
        return [
            'card_expire_date'                   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'card_rate_balance'                  => [
                'numeric',
            ],
            'card_atm_commission'                => [
                'numeric',
            ],
            'card_other_atm_commission'          => [
                'numeric',
            ],
            'card_credit_interest_rate'          => [
                'numeric',
            ],
            'card_credit_grace_period'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'card_credit_min_payment_percent'    => [
                'numeric',
            ],
            'card_credit_min_payment_day'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'account_open_date'                  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'account_interest_rate'              => [
                'numeric',
            ],
            'account_close_date'                 => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'account_credit_one_time_commission' => [
                'numeric',
            ],
            'account_credit_monthly_commission'  => [
                'numeric',
            ],
            'account_credit_payment_day'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'loan_give_date'                     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'loan_take_date'                     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'loan_debitor_phone'                 => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
            'loan_interest_rate'                 => [
                'numeric',
            ],
            'immovables_living_space'            => [
                'numeric',
            ],
            'immovables_usable_space'            => [
                'numeric',
            ],
            'immovables_landing_plot'            => [
                'numeric',
            ],
            'immovables_distance_to_city'        => [
                'numeric',
            ],
            'immovables_floor'                   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'immovables_count_floor'             => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'immovables_city'                    => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'immovables_district'                => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'immovables_purchase_date'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'auto_transport_type'                => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'auto_model'                         => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'auto_modification'                  => [
                'string',
                'min:2',
                'max:100',
                'nullable',
            ],
            'auto_color'                         => [
                'string',
                'nullable',
            ],
            'auto_year'                          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'auto_engine_size'                   => [
                'numeric',
            ],
            'auto_region'                        => [
                'string',
                'nullable',
            ],
            'auto_mileage'                       => [
                'numeric',
            ],
            'auto_purchase_date'                 => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
