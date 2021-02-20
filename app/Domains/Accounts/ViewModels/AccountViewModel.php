<?php


namespace Domains\Accounts\ViewModels;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\Models\Account;

class AccountViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AccountData $accountData
    )
    {}

    public function account(): AccountData
    {
        return $this->accountData ?? AccountData::fromModel(new Account());
    }
}
