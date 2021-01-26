<?php


namespace Domains\Teams\Actions;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\Models\Team;
use Domains\Teams\ViewModels\TeamViewModel;

class UpdateTeamAction extends \Parents\Actions\Action
{
    public function __invoke(TeamData $teamData, Team $team): TeamViewModel
    {
        $team->update($teamData->toArray());
        return new TeamViewModel(TeamData::fromModel($team));
    }
}
