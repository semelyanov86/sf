<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\RoleData;
use Domains\Users\Models\Role;
use Domains\Users\Tasks\UpdateRoleTask;
use Domains\Users\ViewModels\RoleViewModel;

class UpdateRoleAction extends \Parents\Actions\Action
{
    public function __invoke(RoleData $dto, Role $role): RoleViewModel
    {
        $taskModel = new UpdateRoleTask($role);
        return $taskModel->run($dto);
    }
}
