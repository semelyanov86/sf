<?php

namespace Domains\Categories\Http\Requests;

use Domains\Categories\Models\Category;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('category_create');
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
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sys_category' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'last_used_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}