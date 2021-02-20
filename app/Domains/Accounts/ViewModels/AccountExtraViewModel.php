<?php


namespace Domains\Accounts\ViewModels;


use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\AccountsExtra;

class AccountExtraViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AccountExtraData $accountExtraData
    )
    {}

    public function accountExtra(): AccountExtraData
    {
        return $this->accountExtraData ?? AccountExtraData::fromModel(new AccountsExtra());
    }
}
