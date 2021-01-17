<?php


namespace Domains\Users\Tasks;


use Domains\Teams\DataTransferObjects\TeamDataCollection;
use Domains\Teams\Models\Team;
use Domains\Users\DataTransferObjects\RoleDataCollection;
use Domains\Users\DataTransferObjects\UserDataCollection;
use Domains\Users\Models\Role;
use Domains\Users\Models\User;
use Domains\Users\ViewModels\UserListViewModel;

class GetAllUsersTask extends \Parents\Tasks\Task
{
    public function run(): UserListViewModel
    {
        $users = UserDataCollection::fromArray(User::with(['roles', 'team'])->get()->all());

        $roles = RoleDataCollection::fromArray(Role::get()->all());

        $teams = TeamDataCollection::fromArray(Team::get()->all());

        return new UserListViewModel($users, $roles, $teams);
    }
}
