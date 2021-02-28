<?php


namespace Domains\Operations\Actions;


use Domains\Operations\DataTransferObjects\OperationData;
use Domains\Operations\Models\Operation;
use Domains\Operations\ViewModels\OperationViewModel;

final class EditOperationAction extends \Parents\Actions\Action
{
    public function __invoke(Operation $operation): OperationViewModel
    {
        $operation->load('source_account', 'to_account', 'category', 'user', 'team');
        $operationData = OperationData::fromModel($operation);
        return new OperationViewModel($operationData);
    }
}
