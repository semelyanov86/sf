<?php

namespace Domains\Targets\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Domains\Targets\Enums\TypeSelectEnum;
use Domains\Targets\Models\TargetCategory;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreTargetCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('target_category_create');
    }

    public function rules(): array
    {
        return [
            'target_category_name' => [
                'string',
                'min:3',
                'max:190',
                'required',
            ],
            'target_category_type' => [
                'required'
            ],
        ];
    }
}
