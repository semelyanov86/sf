<?php


namespace Domains\Targets\ViewModels;


use Domains\Targets\DataTransferObjects\TargetCategoryData;
use Domains\Targets\Models\TargetCategory;

class TargetCategoryViewModel
{
    public function __construct(
        protected ?TargetCategoryData $targetCategoryData
    )
    {}

    public function targetCategory(): TargetCategoryData
    {
        return $this->targetCategoryData ?? TargetCategoryData::fromModel(new TargetCategory());
    }
}
