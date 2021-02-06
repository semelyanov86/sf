<?php


namespace Domains\Targets\Actions;


use Domains\Targets\DataTransferObjects\TargetCategoryData;
use Domains\Targets\Models\TargetCategory;
use Domains\Targets\ViewModels\TargetCategoryViewModel;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StoreTargetCategoryAction extends \Parents\Actions\Action
{
    public function __invoke(TargetCategoryData $dto): TargetCategoryViewModel
    {
        $targetCategory = TargetCategory::create($dto->toArray());

        if (!$dto->target_category_image->isNull()) {
            $targetCategory->addMedia(storage_path('tmp/uploads/' . $dto->target_category_image->url))->toMediaCollection('target_category_image');
        }

        if ($media = $dto->ck_media) {
            Media::whereIn('id', $media)->update(['model_id' => $targetCategory->id]);
        }
        return new TargetCategoryViewModel(TargetCategoryData::fromModel($targetCategory));
    }
}
