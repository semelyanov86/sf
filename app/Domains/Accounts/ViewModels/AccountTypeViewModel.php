<?php


namespace Domains\Accounts\ViewModels;


use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\AccountType;

class AccountTypeViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AccountTypeData $accountTypeData
    )
    {}

    public function accountType(): AccountTypeData
    {
        return $this->accountTypeData ?? AccountTypeData::fromModel(new AccountType());
    }
}
