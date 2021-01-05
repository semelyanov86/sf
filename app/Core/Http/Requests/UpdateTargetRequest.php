<?php

namespace App\Http\Controllers\Requests;

use App\Models\Target;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTargetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('target_edit');
    }

    public function rules()
    {
        return [
            'target_category_id' => [
                'required',
                'integer',
            ],
            'target_name'        => [
                'string',
                'min:2',
                'max:190',
                'required',
            ],
            'target_status'      => [
                'required',
            ],
            'amount'             => [
                'required',
            ],
            'first_pay_date'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pay_to_date'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
