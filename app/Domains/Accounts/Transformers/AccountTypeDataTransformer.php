<?php


namespace Domains\Accounts\Transformers;


use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\AccountType;

class AccountTypeDataTransformer extends \Parents\Transformers\Transformer
{
    public function transform(AccountType $accountTypeData): array
    {
        return array(
            'id' => $accountTypeData->id,
            'name' => $accountTypeData->name,
            'parent_description' => $accountTypeData->parent_description
        );
    }
}
