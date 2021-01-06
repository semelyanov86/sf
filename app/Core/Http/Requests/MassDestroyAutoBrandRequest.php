<?php

namespace App\Http\Requests;

use App\Models\AutoBrand;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAutoBrandRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('auto_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:auto_brands,id',
        ];
    }
}
