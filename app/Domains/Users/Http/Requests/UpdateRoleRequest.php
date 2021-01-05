<?php

namespace Domains\Users\Http\Requests;

use Domains\Users\Models\Role;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class UpdateRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('role_edit');
    }

    public function rules() : array
    {
        return [
            'title'         => [
                'string',
                'required',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'required',
                'array',
            ],
        ];
    }
}
