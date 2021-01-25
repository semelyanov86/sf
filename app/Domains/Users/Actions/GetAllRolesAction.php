<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\RoleDataCollection;
use Domains\Users\Models\Role;
use Domains\Users\Tasks\GetAllRolesTask;
use Domains\Users\ViewModels\RoleListViewModel;

class GetAllRolesAction extends \Parents\Actions\Action
{
    public function __invoke(): RoleListViewModel
    {
        $taskModel = new GetAllRolesTask();
        return $taskModel->run();
    }
}
