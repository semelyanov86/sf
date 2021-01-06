<?php

namespace App\Http\Requests;

use App\Models\Country;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreCountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('country_create');
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
