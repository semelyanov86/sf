<?php

namespace Domains\Targets\Http\Requests;

use Domains\Targets\Models\TargetCategory;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTargetCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('target_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:target_categories,id',
        ];
    }
}
