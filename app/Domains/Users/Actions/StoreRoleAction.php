<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\RoleData;
use Domains\Users\Tasks\StoreRoleTask;
use Domains\Users\ViewModels\RoleViewModel;

class StoreRoleAction extends \Parents\Actions\Action
{
    public function __invoke(RoleData $dto): RoleViewModel
    {
        $taskModel = new StoreRoleTask();
        return $taskModel->run($dto);
    }
}
