<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;

class DeleteAccountAction extends \Parents\Actions\Action
{
    public function __invoke(Account $account): void
    {
        $account->delete();
        $accountExtra = AccountsExtra::find($account->id);
        if ($accountExtra) {
            $accountExtra->delete();
        }
    }
}
