<?php


namespace Domains\Targets\Transformers;


use Domains\Targets\DataTransferObjects\TargetCategoryData;
use Domains\Targets\Enums\TypeSelectEnum;

class TargetCategoryTransformer extends \Parents\Transformers\Transformer
{
    public function transform(TargetCategoryData $targetCategoryData): array
    {
        return array(
            'id' => $targetCategoryData->id,
            'target_category_name' => $targetCategoryData->target_category_name,
            'target_category_type' => TypeSelectEnum::fromValue($targetCategoryData->target_category_type)->description,
            'target_category_image' => $targetCategoryData->target_category_image->isNull() ? null : $targetCategoryData->target_category_image->toNative()
        );
    }
}
