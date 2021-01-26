<?php


namespace Domains\Teams\Transformers;


use Domains\Teams\DataTransferObjects\TeamData;
use Domains\Users\Transformers\UserTransformer;

class TeamTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = ['owner'];

    public function transform(TeamData $teamData): array
    {
        return array(
            'id' => $teamData->id,
            'name' => $teamData->name,
            'owner_id' => $teamData->owner_id
        );
    }

    public function includeOwner(TeamData $teamData): \League\Fractal\Resource\Item
    {
        return $this->item($teamData->owner, new UserTransformer());
    }
}
