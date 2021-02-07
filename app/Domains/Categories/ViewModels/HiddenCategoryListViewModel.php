<?php


namespace Domains\Categories\ViewModels;


use Domains\Categories\DataTransferObjects\CategoryDataCollection;
use Domains\Categories\DataTransferObjects\HiddenCategoryDataCollection;
use Domains\Categories\Models\Category;
use Domains\Categories\Models\HiddenCategory;

final class HiddenCategoryListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?HiddenCategoryDataCollection $hiddenCategoryDataCollection
    )
    {}

    public function hiddenCategories(): HiddenCategoryDataCollection
    {
        return $this->hiddenCategoryDataCollection ?? HiddenCategoryDataCollection::fromCollection(HiddenCategory::all());
    }
}
