<?php


namespace Domains\Users\DataTransferObjects;


use Domains\Users\Models\Role;

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

}
