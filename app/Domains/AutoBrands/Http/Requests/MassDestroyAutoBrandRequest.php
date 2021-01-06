<?php

namespace Domains\AutoBrands\Http\Requests;

use Domains\AutoBrands\Models\AutoBrand;
use Gate;
use Parents\Requests\Request as FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAutoBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('auto_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:auto_brands,id',
        ];
    }
}
