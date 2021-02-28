<?php


namespace Domains\Operations\Actions;


use Domains\Operations\DataTransferObjects\OperationData;
use Domains\Operations\Models\Operation;

final class StoreOperationAction extends \Parents\Actions\Action
{
    public function __invoke(OperationData $operationData): OperationData
    {
        $operation = Operation::create($operationData->toArray());

        if ($operationData->attachment?->file_name) {
            $operation->addMedia(storage_path('tmp/uploads/' . $operationData->attachment->file_name))->toMediaCollection('attachment');
        }
        return OperationData::fromModel($operation);
    }
}
