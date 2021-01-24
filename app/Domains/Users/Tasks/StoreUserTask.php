<?php


namespace Domains\Users\Tasks;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Users\DataTransferObjects\RoleDataCollection;
use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Models\User;
use Domains\Users\ViewModels\UserViewModel;

class StoreUserTask extends \Parents\Tasks\Task
{
    public function run(UserData $dto): UserViewModel
    {
        $userModel = User::create($dto->toArray());
        $userModel->roles()->sync($dto->roles->toIds());
        return new UserViewModel(
            UserData::fromModel($userModel), 
            RoleDataCollection::fromCollection($userModel->roles), 
            TeamData::fromModel($userModel->team)
        );
    }
}
