<?php


namespace Domains\Targets\ViewModels;


use Domains\Targets\DataTransferObjects\TargetDataCollection;
use Domains\Targets\Models\TargetCategory;

final class TargetListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?TargetDataCollection $targetDataCollection
    )
    {}

    public function targets(): TargetDataCollection
    {
        return $this->targetDataCollection ?? TargetDataCollection::fromCollection(TargetCategory::all());
    }
}
