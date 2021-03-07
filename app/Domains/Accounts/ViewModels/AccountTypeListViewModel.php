<?php

namespace Domains\Accounts\ViewModels;

use Domains\Accounts\DataTransferObjects\AccountTypeDataCollection;
use Domains\Accounts\Models\AccountType;
use Illuminate\Support\Collection;

class AccountTypeListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?Collection $accountTypeDataCollection
    )
    {}

    public function accountTypes(): Collection
    {
        return $this->accountTypeDataCollection ?? collect([]);
    }
}
