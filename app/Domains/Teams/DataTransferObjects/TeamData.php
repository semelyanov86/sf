<?php


namespace Domains\Teams\DataTransferObjects;


use Carbon\Carbon;
use Domains\Teams\Http\Requests\StoreTeamRequest;
use Domains\Teams\Http\Requests\UpdateTeamRequest;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;

final class TeamData extends \Parents\DataTransferObjects\ObjectData
{
    public int $id;

    public string $name;

    public int $owner_id;

    public User $owner;

    public Carbon $created_at;

    public static function fromRequest(StoreTeamRequest|UpdateTeamRequest $request): self
    {
        return new self([
            'name' => $request->get('name'),
            'owner_id' => $request->get('owner_id')
        ]);
    }

    public static function fromModel(Team $team): self
    {
        return new self([
            'id' => $team->id,
            'name' => $team->name,
            'owner' => $team->owner,
            'created_at' => $team->created_at
        ]);
    }
}
