<?php

namespace Domains\Countries\Http\Requests;

use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateCountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('country_edit');
    }

    public function rules(): array
    {
        return [
            'name'       => [
                'string',
                'required',
            ],
            'short_code' => [
                'string',
                'required',
            ],
        ];
    }
}
