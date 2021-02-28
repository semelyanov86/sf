<?php


namespace Domains\Operations\Actions;


use Domains\Operations\DataTransferObjects\OperationDataCollection;
use Domains\Operations\Tasks\GetOperationsByFilter;

class IndexOperationsAction extends \Parents\Actions\Action
{
    public function __invoke(): OperationDataCollection
    {
        $task = app(GetOperationsByFilter::class);
        return $task->run();
    }
}
