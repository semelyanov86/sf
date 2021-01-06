<?php

namespace App\Http\Requests;

use App\Models\Target;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTargetRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('target_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:targets,id',
        ];
    }
}
