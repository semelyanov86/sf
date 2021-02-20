<?php


namespace Domains\Accounts\Actions;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountExtraData;
use Domains\Accounts\Tasks\StoreAccountTask;
use Domains\Accounts\ViewModels\AccountViewModel;

class StoreAccountAction extends \Parents\Actions\Action
{
    public function __invoke(AccountData $dto, AccountExtraData $extraData): AccountViewModel
    {
        $taskModel = new StoreAccountTask();
        return $taskModel->run($dto, $extraData);
    }
}
