<?php

namespace Domains\Targets\Http\Requests;

use BenSampo\Enum\Rules\EnumValue;
use Domains\Targets\Enums\TypeSelectEnum;
use Gate;
use Parents\Requests\Request as FormRequest;

class UpdateTargetCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('target_category_edit');
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
