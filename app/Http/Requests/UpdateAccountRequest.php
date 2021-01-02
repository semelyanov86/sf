<?php

namespace App\Http\Requests;

use App\Models\Account;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_edit');
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'min:3',
                'max:190',
                'required',
            ],
            'state'         => [
                'required',
            ],
            'start_balance' => [
                'required',
            ],
            'market_value'  => [
                'required',
            ],
            'extra_prefix'  => [
                'string',
                'min:1',
                'max:10',
                'nullable',
            ],
        ];
    }
}
