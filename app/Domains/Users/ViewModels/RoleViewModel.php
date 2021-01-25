<?php


namespace Domains\Users\ViewModels;


use Domains\Users\DataTransferObjects\PermissionDataCollection;
use Domains\Users\DataTransferObjects\RoleData;
use Domains\Users\Models\Permission;
use Domains\Users\Models\Role;
use Illuminate\Support\Collection;

class RoleViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?RoleData $role = null,
        protected ?PermissionDataCollection $permissions = null,
    )
    {
    }

    public function role(): RoleData
    {
        return $this->role ?? RoleData::fromModel(new Role());
    }

    public function permissions(): PermissionDataCollection
    {
        return $this->permissions ?? PermissionDataCollection::fromCollection(Permission::all());
    }
    
}
