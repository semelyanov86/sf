<?php

namespace App\Http\Controllers\Requests;

use App\Models\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('currency_create');
    }

    public function rules()
    {
        return [
            'code'        => [
                'string',
                'min:1',
                'max:10',
                'required',
                'unique:currencies',
            ],
            'update_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'users.*'     => [
                'integer',
            ],
            'users'       => [
                'array',
            ],
            'name'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
