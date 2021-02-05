<?php

namespace Domains\Banks\Http\Requests;

use Domains\Banks\Models\Bank;
use Gate;
use Parents\Requests\Request as FormRequest;
use Illuminate\Http\Response;

class EditBankRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->check('bank_edit');
    }

    public function rules(): array
    {
        return [];
    }
}
