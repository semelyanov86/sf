<?php

namespace Domains\Users\Http\Requests;

use App\Models\Role;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules() : array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:roles,id',
        ];
    }
}
