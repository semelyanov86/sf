<?php


namespace Domains\Users\DataTransferObjects;


use Carbon\Carbon;
use Domains\Users\Http\Requests\StorePermissionRequest;
use Domains\Users\Http\Requests\UpdatePermissionRequest;
use Domains\Users\Models\Permission;

final class PermissionData extends \Parents\DataTransferObjects\ObjectData
{
    public int $id;

    public string $title;

    public ?Carbon $created_at;

    public static function fromRequest(StorePermissionRequest|UpdatePermissionRequest $request): self
    {
        return new self([
            'title' => $request->get('title')
        ]);
    }

    public static function fromModel(Permission $permission): self
    {
        return new self([
            'id' => $permission->id,
            'title' => $permission->title,
            'created_at' => $permission->created_at
        ]);
    }

}
