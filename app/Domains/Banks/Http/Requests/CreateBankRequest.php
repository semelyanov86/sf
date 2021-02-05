<?php

namespace Domains\Banks\Http\Requests;

use Domains\Banks\Models\Bank;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class CreateBankRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->check('bank_create');
    }

    public function rules(): array
    {
        return [];
    }
}
