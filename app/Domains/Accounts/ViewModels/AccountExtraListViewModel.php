<?php


namespace Domains\Accounts\ViewModels;


use Domains\Accounts\DataTransferObjects\AccountExtraDataCollection;
use Domains\Accounts\Models\AccountsExtra;

class AccountExtraListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AccountExtraDataCollection $accountExtraDataCollection
    )
    {}

    public function accounts(): AccountExtraDataCollection
    {
        return $this->accountExtraDataCollection ?? AccountExtraDataCollection::fromCollection(AccountsExtra::all());
    }
}
