<?php

namespace Domains\Categories\Http\Requests;

use Domains\Categories\Models\HiddenCategory;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHiddenCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('hidden_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hidden_categories,id',
        ];
    }
}
