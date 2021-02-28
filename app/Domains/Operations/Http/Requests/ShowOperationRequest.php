<?php


namespace Domains\Operations\Http\Requests;


class ShowOperationRequest extends \Parents\Requests\Request
{
    /**
     * @return  bool
     */
    public function authorize(): bool
    {
        return $this->check('operation_show');
    }

    /**
     * @return  array
     */
    public function rules(): array
    {
        return [
            // put your rules here
        ];
    }
}
