<?php


namespace Domains\Users\Actions;


use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Tasks\StoreUserTask;
use Domains\Users\ViewModels\UserViewModel;

class StoreUserAction extends \Parents\Actions\Action
{
    public function __invoke(UserData $dto): UserViewModel
    {
        $taskModel = new StoreUserTask();
        return $taskModel->run($dto);
    }
}
