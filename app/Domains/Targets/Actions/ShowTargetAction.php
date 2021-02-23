<?php


namespace Domains\Targets\Actions;


use Domains\Targets\DataTransferObjects\TargetData;
use Domains\Targets\ViewModels\TargetViewModel;

final class ShowTargetAction extends \Parents\Actions\Action
{
    public function __invoke(TargetData $targetData): TargetViewModel
    {
        return new TargetViewModel($targetData);
    }
}
