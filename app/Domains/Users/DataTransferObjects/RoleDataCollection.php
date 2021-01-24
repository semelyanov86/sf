<?php


namespace Domains\Users\DataTransferObjects;


use Domains\Users\Models\Role;
use Illuminate\Support\Collection;

class RoleDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): RoleData
    {
        return parent::current();
    }
    /**
     * @param  Role[]  $data
     * @return RoleDataCollection
     */
    public static function fromArray(array $data): RoleDataCollection
    {
        return new static(array_map(fn(Role $item) => RoleData::fromModel($item), $data));
    }

    /**
     * @param  Role[]  $data
     * @return RoleDataCollection
     */
    public static function fromCollection(Collection $data): RoleDataCollection
    {
        $newData = $data->map(fn(Role $item) => RoleData::fromModel($item));
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
