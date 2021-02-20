<?php


namespace Domains\Accounts\Transformers;


use Domains\Accounts\DataTransferObjects\AccountTypeData;

class AccountTypeDataTransformer extends \Parents\Transformers\Transformer
{
    public function transform(AccountTypeData $accountTypeData): array
    {
        return array(
            'id' => $accountTypeData->id,
            'name' => $accountTypeData->name,
            'parent_description' => $accountTypeData->parent_description
        );
    }
}
