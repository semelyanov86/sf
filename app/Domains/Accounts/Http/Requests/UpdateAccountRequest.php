<?php

namespace Domains\Accounts\Http\Requests;

use Domains\Accounts\Models\Account;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('account_edit');
    }

    public function rules(): array
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
