<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountDataCollection;
use Domains\Accounts\Models\Account;
use Domains\Accounts\ViewModels\AccountListViewModel;

class IndexAccountsAction extends \Parents\Actions\Action
{
    public function __invoke(): AccountListViewModel
    {
        $accounts = AccountDataCollection::fromCollection(Account::with(['account_type', 'currency', 'bank', 'team'])->get());
        return new AccountListViewModel($accounts);
    }
}
