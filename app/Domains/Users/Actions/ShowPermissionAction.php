<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\PermissionData;
use Domains\Users\ViewModels\PermissionViewModel;

class ShowPermissionAction extends \Parents\Actions\Action
{
    public function __invoke(PermissionData $permissionData): PermissionViewModel
    {
        return new PermissionViewModel($permissionData);
    }

}
