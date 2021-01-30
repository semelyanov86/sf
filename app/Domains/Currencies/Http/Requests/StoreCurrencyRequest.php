<?php

namespace Domains\Currencies\Http\Requests;

use Domains\Currencies\Models\Currency;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('currency_create');
    }

    public function rules(): array
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
                'required',
            ],
            'course' => [
                'nullable',
                'numeric'
            ]
        ];
    }
}
