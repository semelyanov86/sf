<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\RoleData;

class DeleteRoleAction extends \Parents\Actions\Action
{
    public function __invoke(RoleData $dto): void
    {
        $dto->toModel()->delete();
    }
}
