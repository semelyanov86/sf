<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Tasks\StoreAccountTask;
use Domains\Accounts\ViewModels\AccountViewModel;
use Parents\Foundation\Facades\SF;

class StoreAccountAction extends \Parents\Actions\Action
{
    public function __invoke(AccountData $dto, AccountExtraData $extraData): Account
    {
        $taskModel = SF::call('Accounts@StoreAccountTask', [$dto, $extraData]);
        return $taskModel;
    }
}
