<?php


namespace Domains\Teams\ViewModels;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\Models\Team;
use Domains\Users\DataTransferObjects\UserDataCollection;

class TeamViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?TeamData $team = null,
        protected ?UserDataCollection $users = null
    )
    {
    }

    public function team(): TeamData
    {
        return $this->team ?? TeamData::fromModel(new Team());
    }

    public function users(): UserDataCollection
    {
        return $this->users ?? UserDataCollection::fromArray([]);
    }
}
