<?php


namespace Domains\Teams\Actions;


use Domains\Teams\DataTransferObjects\TeamDataCollection;
use Domains\Teams\Models\Team;
use Domains\Teams\ViewModels\TeamListViewModel;

class GetAllTeamsAction extends \Parents\Actions\Action
{
    public function __invoke(): TeamListViewModel
    {
        $teams = TeamDataCollection::fromCollection(Team::with(['owner'])->get());
        return new TeamListViewModel($teams);
    }
}
