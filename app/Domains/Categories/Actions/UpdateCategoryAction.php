<?php


namespace Domains\Categories\Actions;


use Domains\Categories\DataTransferObjects\CategoryData;
use Domains\Categories\Models\Category;
use Domains\Categories\ViewModels\CategoryViewModel;

final class UpdateCategoryAction extends \Parents\Actions\Action
{
    public function __invoke(Category $category, CategoryData $dto): CategoryViewModel
    {
        $data = $dto->toArray();
        $data['type'] = $dto->type->value;
        $category->update($data);
        return new CategoryViewModel(CategoryData::fromModel($category));
    }
}
