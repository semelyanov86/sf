<?php


namespace Domains\Users\ViewModels;


use Domains\Teams\DataTransferObjects\TeamDataCollection;
use Domains\Users\DataTransferObjects\RoleDataCollection;
use Domains\Users\DataTransferObjects\UserDataCollection;
use Illuminate\Support\Collection;

class UserListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected UserDataCollection $users,
        protected ?RoleDataCollection $roles,
        protected ?TeamDataCollection $teams
    )
    {
    }

    public function users(): UserDataCollection
    {
        return $this->users;
    }

    public function roles(): RoleDataCollection
    {
        return $this->roles ?? RoleDataCollection::fromArray(array());
    }

    public function teams(): TeamDataCollection
    {
        return $this->teams ?? TeamDataCollection::fromArray(array());
    }

    public function toJson(): Collection
    {
        return collect($this->users()->items());
    }
}
