<?php

namespace Domains\Categories\Http\Requests;

use Domains\Categories\Models\Category;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCategoryRequest extends FormRequest
{
    /**
     * @return true
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * @return string[]
     *
     * @psalm-return array{ids: string, 'ids.*': string}
     */
    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:categories,id',
        ];
    }
}
