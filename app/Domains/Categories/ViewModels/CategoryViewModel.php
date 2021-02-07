<?php


namespace Domains\Categories\ViewModels;


use Domains\Categories\DataTransferObjects\CategoryData;
use Domains\Categories\Models\Category;

final class CategoryViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?CategoryData $categoryData
    )
    {}

    public function category(): CategoryData
    {
        return $this->categoryData ?? CategoryData::fromModel(new Category());
    }
}
