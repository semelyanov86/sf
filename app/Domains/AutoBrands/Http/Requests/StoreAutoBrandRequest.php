<?php

namespace Domains\AutoBrands\Http\Requests;

use Domains\AutoBrands\Models\AutoBrand;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreAutoBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('auto_brand_create');
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:auto_brands',
            ],
            'description' => [
                'nullable',
                'min:2',
                'max:500'
            ]
        ];
    }
}
