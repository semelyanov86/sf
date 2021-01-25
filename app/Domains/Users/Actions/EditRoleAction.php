<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\RoleData;
use Domains\Users\ViewModels\RoleViewModel;

class EditRoleAction extends \Parents\Actions\Action
{
    public function __invoke(?RoleData $dto = null): RoleViewModel
    {
        return new RoleViewModel($dto);
    }
}
