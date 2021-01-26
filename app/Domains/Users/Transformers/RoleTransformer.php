<?php


namespace Domains\Users\Transformers;


use Domains\Users\DataTransferObjects\PermissionData;
use Domains\Users\DataTransferObjects\PermissionDataCollection;
use Domains\Users\DataTransferObjects\RoleData;

class RoleTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = ['permissions'];

    public function transform(RoleData $roleData): array
    {
        return array(
            'id' => $roleData->id,
            'title' => $roleData->title,
        );
    }

    public function includePermissions(RoleData $roleData): \League\Fractal\Resource\Collection
    {
        return $this->collection($roleData->permissions, new PermissionTransformer());
    }
}
