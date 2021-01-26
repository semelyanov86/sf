<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\PermissionData;
use Domains\Users\Models\Permission;
use Domains\Users\ViewModels\PermissionViewModel;

class StorePermissionAction extends \Parents\Actions\Action
{
    public function __invoke(PermissionData $dto): PermissionViewModel
    {
        $permissionModel = Permission::create($dto->toArray());
        return new PermissionViewModel(PermissionData::fromModel($permissionModel));
    }
}
