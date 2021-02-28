<?php


namespace Domains\Operations\Actions;


use Domains\Operations\DataTransferObjects\OperationData;
use Domains\Operations\Models\Operation;
use Domains\Operations\ViewModels\OperationViewModel;

final class CreateOperationAction extends \Parents\Actions\Action
{
    public function __invoke(): OperationViewModel
    {
        return new OperationViewModel();
    }
}
