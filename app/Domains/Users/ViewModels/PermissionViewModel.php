<?php


namespace Domains\Users\ViewModels;


use Domains\Users\DataTransferObjects\PermissionData;
use Domains\Users\Models\Permission;

class PermissionViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?PermissionData $permission = null,
    )
    {
    }

    public function permission(): PermissionData
    {
        return $this->permission ?? PermissionData::fromModel(new Permission());
    }

}
