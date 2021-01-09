<?php

namespace Domains\Users\Http\Requests;

use Domains\Users\Models\Permission;
use Gate;
use Parents\Requests\Request as FormRequest;
use Response;

class UpdatePermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('permission_edit');
    }

    /**
     * @return string[][]
     *
     * @psalm-return array{title: array{0: string, 1: string}}
     */
    public function rules(): array
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
