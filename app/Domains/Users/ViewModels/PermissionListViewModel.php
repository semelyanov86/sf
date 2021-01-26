<?php


namespace Domains\Users\ViewModels;


use Domains\Users\DataTransferObjects\PermissionDataCollection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class PermissionListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?PermissionDataCollection $permissions,
        protected ?LengthAwarePaginator $paginator = null,
    )
    {
    }

    public function permissions(): PermissionDataCollection
    {
        return $this->permissions ?? PermissionDataCollection::fromArray(array());
    }

    public function paginator(): LengthAwarePaginator
    {
        return $this->paginator ?? new \Illuminate\Pagination\LengthAwarePaginator([], 0, 50);
    }

    public function toJson(): Collection
    {
        return collect($this->permissions()->items());
    }
}
