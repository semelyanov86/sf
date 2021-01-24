<?php


namespace Domains\Users\Tasks;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Users\DataTransferObjects\RoleDataCollection;
use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Models\User;
use Domains\Users\ViewModels\UserViewModel;

class UpdateUserTask extends \Parents\Tasks\Task
{
    public function __construct(protected User $user)
    {
    }

    public function run(UserData $dto): UserViewModel
    {        
        $this->user->update($dto->toArray());
        $this->user->roles()->sync($dto->roles->toIds());

        return new UserViewModel(
            UserData::fromModel($this->user),
            RoleDataCollection::fromCollection($this->user->roles),
            TeamData::fromModel($this->user->team)
        );
    }
}
