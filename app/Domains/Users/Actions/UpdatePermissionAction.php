<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\PermissionData;
use Domains\Users\Models\Permission;
use Domains\Users\ViewModels\PermissionViewModel;

class UpdatePermissionAction extends \Parents\Actions\Action
{
    public function __invoke(PermissionData $dto, Permission $permission): PermissionViewModel
    {
        $permission->update($dto->toArray());
        return new PermissionViewModel(
            PermissionData::fromModel($permission)
        );
    }
}
