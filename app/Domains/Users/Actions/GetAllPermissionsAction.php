<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\PermissionDataCollection;
use Domains\Users\Models\Permission;
use Domains\Users\ViewModels\PermissionListViewModel;

class GetAllPermissionsAction extends \Parents\Actions\Action
{
    public function __invoke(): PermissionListViewModel
    {
        return new PermissionListViewModel(PermissionDataCollection::fromCollection(Permission::all()));
    }
}
