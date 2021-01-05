<?php

namespace Domains\Users\Http\Requests;

use Domains\Users\Models\Permission;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules() : array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:permissions,id',
        ];
    }
}
