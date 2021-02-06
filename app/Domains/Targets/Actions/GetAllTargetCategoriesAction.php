<?php


namespace Domains\Targets\Actions;


use Domains\Targets\DataTransferObjects\TargetCategoryDataCollection;
use Domains\Targets\Models\TargetCategory;
use Domains\Targets\ViewModels\TargetCategoryListViewModel;

class GetAllTargetCategoriesAction extends \Parents\Actions\Action
{
    public function __invoke(): TargetCategoryListViewModel
    {
        $targetCategories = TargetCategoryDataCollection::fromCollection(TargetCategory::with(['media'])->get());
        return new TargetCategoryListViewModel($targetCategories);
    }
}
