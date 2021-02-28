<?php


namespace Domains\Targets\Actions;


use Domains\Targets\DataTransferObjects\TargetData;
use Domains\Targets\Models\Target;
use Domains\Targets\ViewModels\TargetViewModel;

final class StoreTargetAction extends \Parents\Actions\Action
{
    public function __invoke(TargetData $targetData): TargetViewModel
    {
        $target = Target::create($targetData->toArray());

        if ($targetData->image->file_name) {
            $target->addMedia(storage_path('tmp/uploads/' . $targetData->image->file_name))->toMediaCollection('image');
        }
        return new TargetViewModel(TargetData::fromModel($target));
    }
}
