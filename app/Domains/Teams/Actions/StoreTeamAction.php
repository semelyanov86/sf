<?php


namespace Domains\Teams\Actions;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\Models\Team;
use Domains\Teams\ViewModels\TeamViewModel;

class StoreTeamAction extends \Parents\Actions\Action
{
    public function __invoke(TeamData $dto): TeamViewModel
    {
        if (!$dto->owner_id) {
            $dto->owner_id = auth()->id();
        }
        $team = Team::create($dto->toArray());
        return new TeamViewModel(TeamData::fromModel($team));
    }
}
