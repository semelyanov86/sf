<?php


namespace Domains\Targets\Actions;


use Domains\Targets\DataTransferObjects\TargetData;
use Domains\Targets\Models\Target;
use Domains\Targets\ViewModels\TargetViewModel;

final class UpdateTargetAction extends \Parents\Actions\Action
{
    public function __invoke(TargetData $targetData, Target $target): TargetViewModel
    {
        $target->update($targetData->toArray());

        if ($targetData->image->file_name) {
            if (!$target->image || $targetData->image->file_name !== $target->image) {
                if ($target->image) {
                    $target->image->delete();
                }

                $target->addMedia(storage_path('tmp/uploads/' . $targetData->image->file_name))->toMediaCollection('image');
            }
        } elseif ($target->image) {
            $target->image->delete();
        }
        return new TargetViewModel(TargetData::fromModel($target));
    }
}
