<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountTypeDataCollection;
use Domains\Accounts\Models\AccountType;
use Domains\Accounts\ViewModels\AccountTypeListViewModel;

class IndexAccountTypesAction extends \Parents\Actions\Action
{
    public function __invoke(): AccountTypeListViewModel
    {
        $accounts = AccountTypeDataCollection::fromCollection(AccountType::all());
        return new AccountTypeListViewModel($accounts);
    }
}
