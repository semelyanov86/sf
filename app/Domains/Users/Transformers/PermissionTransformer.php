<?php


namespace Domains\Users\Transformers;


use Domains\Users\DataTransferObjects\PermissionData;

class PermissionTransformer extends \Parents\Transformers\Transformer
{
    public function transform(PermissionData $permissionData): array
    {
        return array(
            'id' => $permissionData->id,
            'title' => $permissionData->title,
        );
    }
}
