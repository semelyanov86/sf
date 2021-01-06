<?php

namespace Domains\Currencies\Http\Requests;

use Domains\Currencies\Models\Currency;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateCurrencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('currency_edit');
    }

    public function rules(): array
    {
        return [
            'code'        => [
                'string',
                'min:1',
                'max:10',
                'required',
                'unique:currencies,code,' . request()->route('currency')->id,
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
