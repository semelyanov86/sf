<?php


namespace Domains\Users\DataTransferObjects;


use Carbon\Carbon;
use Domains\Users\Http\Requests\StoreRoleRequest;
use Domains\Users\Http\Requests\UpdateRoleRequest;
use Domains\Users\Models\Role;

final class RoleData extends \Parents\DataTransferObjects\ObjectData
{
    public int $id;

    public string $title;

    public PermissionDataCollection $permissions;

    public ?Carbon $created_at;

    public static function fromRequest(StoreRoleRequest|UpdateRoleRequest $request): self
    {
        return new self([
            'title' => $request->get('title')
        ]);
    }

    public static function fromModel(Role $role): self
    {
        return new self([
            'id' => $role->id,
            'title' => $role->title,
            'created_at' => $role->created_at,
            'permissions' => PermissionDataCollection::fromCollection($role->permissions),
        ]);
    }

    public function toModel(): Role
    {
        return Role::whereId($this->id)->firstOrFail();
    }

}
