<?php


namespace Domains\Teams\ViewModels;


use Domains\Teams\DataTransferObjects\TeamDataCollection;
use Domains\Teams\Virtual\Models\Team;

class TeamListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?TeamDataCollection $teams
    )
    {
    }

    public function teams(): TeamDataCollection
    {
        return $this->teams ?? TeamDataCollection::fromArray([]);
    }
}
