<?php


namespace Domains\Users\ViewModels;


use Domains\Users\DataTransferObjects\PermissionDataCollection;
use Illuminate\Support\Collection;

class PermissionListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?PermissionDataCollection $permissions,
    )
    {
    }

    public function permissions(): PermissionDataCollection
    {
        return $this->permissions ?? PermissionDataCollection::fromArray(array());
    }

    public function toJson(): Collection
    {
        return collect($this->permissions()->items());
    }
}
