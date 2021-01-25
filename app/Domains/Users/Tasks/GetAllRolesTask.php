<?php


namespace Domains\Users\Tasks;


use Domains\Users\DataTransferObjects\RoleDataCollection;
use Domains\Users\Models\Role;
use Domains\Users\ViewModels\RoleListViewModel;

class GetAllRolesTask extends \Parents\Tasks\Task
{
    public function run(): RoleListViewModel
    {
        $roles = RoleDataCollection::fromCollection(Role::with(['permissions'])->get());
        return new RoleListViewModel($roles);
    }
}
