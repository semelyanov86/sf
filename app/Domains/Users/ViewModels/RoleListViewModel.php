<?php


namespace Domains\Users\ViewModels;


use Domains\Users\DataTransferObjects\RoleDataCollection;
use Illuminate\Support\Collection;

class RoleListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?RoleDataCollection $roles,
    )
    {
    }

    public function roles(): RoleDataCollection
    {
        return $this->roles ?? RoleDataCollection::fromArray(array());
    }

    public function toJson(): Collection
    {
        return collect($this->roles()->items());
    }
}
