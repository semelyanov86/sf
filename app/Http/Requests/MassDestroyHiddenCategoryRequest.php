<?php

namespace App\Http\Requests;

use App\Models\HiddenCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHiddenCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hidden_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hidden_categories,id',
        ];
    }
}
