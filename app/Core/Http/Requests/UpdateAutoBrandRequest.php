<?php

namespace App\Http\Requests;

use App\Models\AutoBrand;
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
        return [
            'name' => [
                'string',
                'min:2',
                'max:100',
                'required',
                'unique:auto_brands,name,' . request()->route('auto_brand')->id,
            ],
        ];
    }
}
