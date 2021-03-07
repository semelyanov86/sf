<?php


namespace Domains\Accounts\ViewModels;


use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\AccountType;

class AccountTypeViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AccountType $accountTypeData
    )
    {}

    public function accountType(): AccountType
    {
        return $this->accountTypeData ?? new AccountType();
    }
}
