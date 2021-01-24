<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Models\User;
use Domains\Users\Tasks\StoreUserTask;
use Domains\Users\Tasks\UpdateUserTask;
use Domains\Users\ViewModels\UserViewModel;

class UpdateUserAction extends \Parents\Actions\Action
{
    public function __invoke(UserData $dto, User $user): UserViewModel
    {
        $taskModel = new UpdateUserTask($user);
        return $taskModel->run($dto);
    }
}
