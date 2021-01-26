<?php


namespace Domains\Teams\Actions;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Teams\Models\Team;
use Domains\Teams\ViewModels\TeamViewModel;
use Domains\Users\DataTransferObjects\UserDataCollection;
use Domains\Users\Models\User;

class TeamMembersAction extends \Parents\Actions\Action
{
    public function __invoke(): TeamViewModel
    {
        $team  = Team::where('owner_id', auth()->user()->id)->firstOrFail();
        $users = User::where('team_id', $team->id)->get();
        return new TeamViewModel(TeamData::fromModel($team), UserDataCollection::fromCollection($users));
    }
}
