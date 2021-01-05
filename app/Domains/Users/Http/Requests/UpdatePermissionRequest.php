<?php

namespace Domains\Users\Http\Requests;

use Domains\Users\Models\Permission;
use Gate;
use Parents\Requests\Request as FormRequest;
use Response;

class UpdatePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('permission_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
