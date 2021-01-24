<?php


namespace Domains\Teams\DataTransferObjects;


use Domains\Teams\Models\Team;
use Illuminate\Support\Collection;

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

    /**
     * @param  Team[]  $data
     * @return TeamDataCollection
     */
    public static function fromCollection(Collection $data): TeamDataCollection
    {
        $newData = $data->map(fn(Team $item) => TeamData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
