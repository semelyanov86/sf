<?php


namespace Domains\Users\DataTransferObjects;


use Domains\Users\Models\Permission;
use Illuminate\Support\Collection;

class PermissionDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): PermissionData
    {
        return parent::current();
    }

    /**
     * @param  Permission[]  $data
     * @return PermissionDataCollection
     */
    public static function fromArray(iterable $data): PermissionDataCollection
    {
        return new self(
            array_map(fn(Permission $item) => PermissionData::fromModel($item), $data)
        );
    }

    /**
     * @param  PermissionData[]  $data
     * @return PermissionDataCollection
     */
    public static function fromCollection(Collection $data): PermissionDataCollection
    {
        $newData = $data->map(fn(Permission $item) => PermissionData::fromModel($item));
        return new self(
            $newData->toArray()
        );
    }

    public function toIds(): array
    {
        $roles = collect($this->toArray())->pluck('id');
        return $roles->toArray();
    }
}
