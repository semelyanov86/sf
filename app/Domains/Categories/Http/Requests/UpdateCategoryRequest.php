<?php

namespace Domains\Categories\Http\Requests;

use Domains\Categories\Models\Category;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('category_edit');
    }

    public function rules(): array
    {
        return [
            'name'         => [
                'string',
                'min:3',
                'max:190',
                'required',
            ],
            'parent'       => [
                'nullable',
                'exists:Domains\Categories\Models\Category,id'
            ],
            'sys_category' => [
                'nullable',
                'exists:Domains\Categories\Models\Category,id'
            ],
            'is_hidden' => [
                'required', 'boolean'
            ],
            'last_used_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
