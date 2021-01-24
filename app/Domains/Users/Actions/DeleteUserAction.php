<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\UserData;

class DeleteUserAction extends \Parents\Actions\Action
{
    public function __invoke(UserData $dto): void
    {
        $dto->toModel()->delete();
    }
}
