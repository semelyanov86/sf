<?php

namespace App\Http\Requests;

use App\Models\Operation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOperationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('operation_create');
    }

    public function rules()
    {
        return [
            'amount'     => [
                'required',
            ],
            'done_at'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'type'       => [
                'required',
            ],
            'cal_repeat' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
