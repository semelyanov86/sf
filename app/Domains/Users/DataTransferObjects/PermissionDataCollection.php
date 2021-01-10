<?php


namespace Domains\Users\DataTransferObjects;


use Domains\Users\Models\Permission;

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
    public static function fromArray(array $data): PermissionDataCollection
    {
        return new self(
            array_map(fn(Permission $item) => PermissionData::fromModel($item), $data)
        );
    }
}
