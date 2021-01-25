<?php


namespace Domains\Users\ViewModels;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\Models\Team;
use Domains\Users\DataTransferObjects\RoleDataCollection;
use Domains\Users\DataTransferObjects\UserData;
use Illuminate\Support\Collection;

class UserViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected UserData $user,
        protected ?RoleDataCollection $roles,
        protected ?TeamData $team,
    )
    {
    }

    public function user(): UserData
    {
        return $this->user;
    }

    public function roles(): RoleDataCollection
    {
        return $this->roles ?? RoleDataCollection::fromArray(array());
    }

    public function team(): TeamData
    {
        return $this->team ?? TeamData::fromModel(new Team());
    }

    public function toJson(): UserData
    {
        return $this->user();
    }
}
