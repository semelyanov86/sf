<?php


namespace Domains\Accounts\ViewModels;


use Domains\Accounts\DataTransferObjects\AccountDataCollection;
use Domains\Accounts\Models\Account;

class AccountListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AccountDataCollection $accountDataCollection
    )
    {}

    public function accounts(): AccountDataCollection
    {
        return $this->accountDataCollection ?? AccountDataCollection::fromCollection(Account::all());
    }
}
