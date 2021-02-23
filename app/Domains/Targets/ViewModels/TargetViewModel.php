<?php


namespace Domains\Targets\ViewModels;


use Domains\Targets\DataTransferObjects\TargetData;
use Domains\Targets\Models\Target;

final class TargetViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?TargetData $targetData
    )
    {}

    public function targetData(): TargetData
    {
        return $this->targetData ?? TargetData::fromModel(new Target());
    }
}
