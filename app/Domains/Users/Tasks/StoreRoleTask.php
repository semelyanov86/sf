<?php


namespace Domains\Users\Tasks;


use Domains\Users\DataTransferObjects\RoleData;
use Domains\Users\Models\Role;
use Domains\Users\ViewModels\RoleViewModel;

class StoreRoleTask extends \Parents\Tasks\Task
{
    public function run(RoleData $dto): RoleViewModel
    {
        $roleModel = Role::create($dto->toArray());
        $roleModel->permissions()->sync($dto->permissions->toIds());
        return new RoleViewModel(
            RoleData::fromModel($roleModel)
        );
    }

}
