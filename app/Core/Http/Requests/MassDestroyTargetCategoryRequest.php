<?php

namespace App\Http\Controllers\Requests;

use App\Models\TargetCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTargetCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('target_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:target_categories,id',
        ];
    }
}
