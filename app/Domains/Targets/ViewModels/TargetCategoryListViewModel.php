<?php


namespace Domains\Targets\ViewModels;


use Domains\Targets\DataTransferObjects\TargetCategoryDataCollection;
use Domains\Targets\Models\TargetCategory;

class TargetCategoryListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?TargetCategoryDataCollection $targetCategoryDataCollection
    )
    {}

    public function targetCategories(): TargetCategoryDataCollection
    {
        return $this->targetCategoryDataCollection ?? TargetCategoryDataCollection::fromCollection(TargetCategory::all());
    }
}
