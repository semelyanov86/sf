<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Domains\Accounts\ViewModels\AccountViewModel;

class ShowAccountAction extends \Parents\Actions\Action
{
    public function __invoke(Account $account): AccountViewModel
    {
        $accountData = AccountData::fromModel($account->load(['account_type', 'currency', 'bank', 'team', 'extra']));
        if (!$accountData->extra) {
            $accountExtra = new AccountsExtra();
            $accountExtra->id = $accountData->id;
            $accountData->extra = AccountExtraData::fromModel($accountExtra);
        }
        return new AccountViewModel($accountData);
    }
}
