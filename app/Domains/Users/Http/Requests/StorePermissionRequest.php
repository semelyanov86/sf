<?php

namespace Domains\Users\Http\Requests;

use Domains\Users\Models\Permission;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class StorePermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('permission_create');
    }

    public function rules() : array
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
