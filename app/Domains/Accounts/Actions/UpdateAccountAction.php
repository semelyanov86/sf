<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Domains\Accounts\ViewModels\AccountViewModel;
use Parents\Foundation\Facades\SF;

class UpdateAccountAction extends \Parents\Actions\Action
{
    public function __invoke(int $account, AccountData $dto, AccountExtraData $extraData): Account
    {
        return SF::call('Accounts@UpdateAccountTask', [$account, $dto, $extraData]);
    }
}
