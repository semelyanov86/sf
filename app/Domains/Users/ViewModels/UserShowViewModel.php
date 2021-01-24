<?php


namespace Domains\Users\ViewModels;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\DataTransferObjects\TeamDataCollection;
use Domains\Teams\Models\Team;
use Domains\Users\DataTransferObjects\RoleDataCollection;
use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Models\Role;
use Domains\Users\Models\User;
use Illuminate\Support\Collection;

class UserShowViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?UserData $user,
        protected ?RoleDataCollection $roles = null,
        protected ?TeamDataCollection $teams = null,
        protected ?Collection $operations = null,
        protected ?Collection $currencies = null,
    )
    {
    }

    public function user(): UserData
    {
        return $this->user ?? UserData::fromModel(new User());
    }

    public function roles(): RoleDataCollection
    {
        return $this->roles ?? RoleDataCollection::fromCollection(Role::all());
    }

    public function teams(): TeamDataCollection
    {
        return $this->team ?? TeamDataCollection::fromCollection(Team::all());
    }

    public function operations(): Collection
    {
        return $this->operations ?? collect([]);
    }

    public function currencies(): Collection
    {
        return $this->currencies ?? collect([]);
    }

    public function toJson(): UserData
    {
        return $this->user();
    }
}
