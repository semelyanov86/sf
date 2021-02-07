<?php


namespace Domains\Categories\ViewModels;


use Domains\Categories\DataTransferObjects\CategoryData;
use Domains\Categories\DataTransferObjects\HiddenCategoryData;
use Domains\Categories\Models\Category;
use Domains\Categories\Models\HiddenCategory;

final class HiddenCategoryViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?HiddenCategoryData $hiddenCategoryData
    )
    {}

    public function hiddenCategory(): HiddenCategoryData
    {
        return $this->hiddenCategoryData ?? HiddenCategoryData::fromModel(new HiddenCategory());
    }
}
