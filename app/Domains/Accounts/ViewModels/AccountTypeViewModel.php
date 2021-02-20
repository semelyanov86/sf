<?php


namespace Domains\Accounts\ViewModels;


use Domains\Accounts\DataTransferObjects\AccountTypeData;

class AccountTypeViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AccountTypeData $accountTypeData
    )
    {}

    public function accountType(): AccountTypeData
    {
        return $this->accountTypeData ?? AccountTypeData::fromModel(new AccountTypeData());
    }
}
