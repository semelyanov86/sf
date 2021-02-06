<?php


namespace Domains\Targets\Actions;


use Domains\Targets\DataTransferObjects\TargetCategoryData;
use Domains\Targets\Models\TargetCategory;
use Domains\Targets\ViewModels\TargetCategoryViewModel;

class UpdateTargetCategoryAction extends \Parents\Actions\Action
{
    public function __invoke(TargetCategory $targetCategory, TargetCategoryData $dto): TargetCategoryViewModel
    {
        $targetCategory->update($dto->toArray());

        if (!$dto->target_category_image->isNull()) {
            if (!$targetCategory->target_category_image || $dto->target_category_image->file_name !== $targetCategory->target_category_image->file_name) {
                if ($targetCategory->target_category_image) {
                    $targetCategory->target_category_image->toModel()->delete();
                }

                $targetCategory->addMedia(storage_path('tmp/uploads/' . $dto->target_category_image->file_name))->toMediaCollection('target_category_image');
            }
        } elseif ($targetCategory->target_category_image->id) {
            $targetCategory->target_category_image->toModel()->delete();
        }
        return new TargetCategoryViewModel(TargetCategoryData::fromModel($targetCategory));
    }
}
