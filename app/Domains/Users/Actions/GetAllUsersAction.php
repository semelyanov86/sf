<?php


namespace Domains\Users\Actions;


use Domains\Users\Http\Requests\GetAllUsersRequest;
use Domains\Users\Tasks\GetAllUsersTask;
use Domains\Users\ViewModels\UserListViewModel;

class GetAllUsersAction extends \Parents\Actions\Action
{
    public function __invoke(): UserListViewModel
    {
        $taskModel = new GetAllUsersTask();
        return $taskModel->run();
    }

}
