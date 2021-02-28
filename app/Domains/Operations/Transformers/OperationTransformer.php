<?php


namespace Domains\Operations\Transformers;


use Domains\Accounts\Transformers\AccountDataTransformer;
use Domains\Categories\DataTransferObjects\CategoryData;
use Domains\Categories\Transformers\CategoryTransformer;
use Domains\Operations\DataTransferObjects\OperationData;
use League\Fractal\Resource\Item;

class OperationTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = ['source_account', 'category', 'to_account'];

    public function transform(OperationData $operationData): array
    {
        return array(
            'id' => $operationData->id,
            'amount' => $operationData->amount->toArray(),
            'done_at' => $operationData->done_at->format('Y-m-d H:i:s'),
            'type' => $operationData->type->toArray(),
            'description' => $operationData->description,
            'related_transactions' => $operationData->related_transactions,
            'cal_repeat' => $operationData->cal_repeat,
            'google_sync' => $operationData->google_sync,
            'remind_operation' => $operationData->remind_operation,
            'is_calendar' => $operationData->is_calendar,
            'created_at' => $operationData->done_at->format('Y-m-d H:i:s'),
            'to_account_id' => $operationData->to_account_id,
            'source_account_id' => $operationData->source_account_id,
            'category_id' => $operationData->category_id,
            'user_id' => $operationData->user_id,
            'attachment' => $operationData->attachment?->url
        );
    }

    public function includeSourceAccount(OperationData $operationData): Item
    {
        return $this->item($operationData->source_account, new AccountDataTransformer());
    }

    public function includeCategory(OperationData $operationData): Item
    {
        return $this->item($operationData->category, new CategoryTransformer());
    }

    public function includeToAccount(OperationData $operationData): Item
    {
        return $this->item($operationData->to_account, new AccountDataTransformer());
    }
}
