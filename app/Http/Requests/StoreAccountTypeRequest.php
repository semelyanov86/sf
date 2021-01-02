<?php

namespace App\Http\Requests;

use App\Models\AccountType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAccountTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_type_create');
    }

    public function rules()
    {
        return [
            'name'               => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:account_types',
            ],
            'parent_description' => [
                'string',
                'min:5',
                'max:100',
                'nullable',
            ],
        ];
    }
}
