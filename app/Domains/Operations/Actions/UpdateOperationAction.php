<?php


namespace Domains\Operations\Actions;


use Domains\Operations\DataTransferObjects\OperationData;
use Domains\Operations\Models\Operation;

final class UpdateOperationAction extends \Parents\Actions\Action
{
    public function __invoke(Operation $operation, OperationData $dto): OperationData
    {
        $operation->update($dto->toArray());

        if ($dto->attachment?->file_name) {
            if (!$operation->attachment || $dto->attachment->file_name !== $operation->attachment->file_name) {
                if ($operation->attachment) {
                    $operation->attachment->delete();
                }

                $operation->addMedia(storage_path('tmp/uploads/' . $dto->attachment->file_name))->toMediaCollection('attachment');
            }
        } elseif ($operation->attachment) {
            $operation->attachment->delete();
        }
        return OperationData::fromModel($operation);
    }
}
