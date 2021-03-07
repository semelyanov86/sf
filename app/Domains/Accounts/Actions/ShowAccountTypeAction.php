<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Domains\Accounts\Models\AccountType;
use Domains\Accounts\ViewModels\AccountTypeViewModel;
use Domains\Accounts\ViewModels\AccountViewModel;
use Parents\Foundation\Facades\SF;

class ShowAccountTypeAction extends \Parents\Actions\Action
{
    public function __invoke(int $account): AccountTypeViewModel
    {
        $type = SF::call('Accounts@FindAccountTypeTask', [$account]);
        return new AccountTypeViewModel($type);
    }
}
