<?php


namespace Domains\Teams\DataTransferObjects;


use Domains\Teams\Models\Team;

class TeamDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): TeamData
    {
        return parent::current();
    }

    /**
     * @param  Team[]  $data
     * @return TeamDataCollection
     */
    public static function fromArray(array $data): TeamDataCollection
    {
        return new self(
            array_map(fn(Team $item) => TeamData::fromModel($item), $data)
        );
    }
}
