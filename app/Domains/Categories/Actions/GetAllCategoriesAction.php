<?php


namespace Domains\Categories\Actions;


use Domains\Categories\DataTransferObjects\CategoryDataCollection;
use Domains\Categories\Models\Category;
use Domains\Categories\ViewModels\CategoryListViewModel;

final class GetAllCategoriesAction extends \Parents\Actions\Action
{
    public function __invoke(): CategoryListViewModel
    {
        $categories = CategoryDataCollection::fromCollection(Category::all());
        return new CategoryListViewModel($categories);
    }
}
