<?php


namespace Domains\Categories\ViewModels;


use Domains\Categories\DataTransferObjects\CategoryDataCollection;
use Domains\Categories\Models\Category;

final class CategoryListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?CategoryDataCollection $categoryDataCollection
    )
    {}

    public function categories(): CategoryDataCollection
    {
        return $this->categoryDataCollection ?? CategoryDataCollection::fromCollection(Category::all());
    }
}
