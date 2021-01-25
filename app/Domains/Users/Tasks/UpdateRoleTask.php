<?php


namespace Domains\Users\Tasks;


use Domains\Users\DataTransferObjects\RoleData;
use Domains\Users\Models\Role;
use Domains\Users\ViewModels\RoleViewModel;

class UpdateRoleTask extends \Parents\Tasks\Task
{
    public function __construct(
        protected Role $role
    )
    {}

    public function run(RoleData $dto): RoleViewModel
    {
        $this->role->update($dto->toArray());
        $this->role->permissions()->sync($dto->permissions->toIds());
        return new RoleViewModel(
            RoleData::fromModel($this->role)
        );
    }
}
