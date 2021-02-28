<?php


namespace Domains\Operations\Tasks;


use Domains\Operations\DataTransferObjects\OperationDataCollection;
use Domains\Operations\Models\Operation;

class GetOperationsByFilter extends \Parents\Tasks\Task
{
    public function run(): OperationDataCollection
    {
        return OperationDataCollection::fromCollection(Operation::with(['source_account', 'to_account', 'category', 'user', 'team'])->get());
    }
}
