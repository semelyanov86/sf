<?php


namespace Domains\Targets\ViewModels;


use Domains\Targets\DataTransferObjects\TargetCategoryData;
use Domains\Targets\Models\TargetCategory;
use Parents\ViewModels\ViewModel;

class TargetCategoryViewModel extends ViewModel
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
