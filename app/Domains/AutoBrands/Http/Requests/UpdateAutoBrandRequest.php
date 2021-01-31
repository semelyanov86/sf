<?php

namespace Domains\AutoBrands\Http\Requests;

use Domains\AutoBrands\Models\AutoBrand;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateAutoBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('auto_brand_edit');
    }

    public function rules(): array
    {
        /** @psalm-suppress all */
        $id = request()->route('auto_brand')->id;
        return [
            'name' => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:auto_brands,name,' . $id,
            ],
            'description' => [
                'nullable',
                'min:2',
                'max:500'
            ]
        ];
    }
}
