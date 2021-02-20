<?php

namespace Domains\Accounts\ViewModels;

use Domains\Accounts\DataTransferObjects\AccountTypeDataCollection;
use Domains\Accounts\Models\AccountType;

class AccountTypeListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AccountTypeDataCollection $accountTypeDataCollection
    )
    {}

    public function accountTypes(): AccountTypeDataCollection
    {
        return $this->accountTypeDataCollection ?? AccountTypeDataCollection::fromCollection(AccountType::all());
    }
}
