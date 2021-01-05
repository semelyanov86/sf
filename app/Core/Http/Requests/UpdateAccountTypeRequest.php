<?php

namespace App\Http\Controllers\Requests;

use App\Models\AccountType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccountTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_type_edit');
    }

    public function rules()
    {
        return [
            'name'               => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:account_types,name,' . request()->route('account_type')->id,
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
