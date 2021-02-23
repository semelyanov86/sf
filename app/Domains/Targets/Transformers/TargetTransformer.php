<?php


namespace Domains\Targets\Transformers;


use Domains\Accounts\Transformers\AccountDataTransformer;
use Domains\Currencies\Transformers\CurrencyTransformer;
use Domains\Targets\DataTransferObjects\TargetData;
use League\Fractal\Resource\Item;

final class TargetTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = array('currency', 'target_category', 'account_from');

    public function transform(TargetData $targetData): array
    {
        return array(
            'id' => $targetData->id,
            'target_type' => $targetData->target_type->toArray(),
            'target_name' => $targetData->target_name,
            'target_status' => $targetData->target_status->toArray(),
            'amount' => $targetData->amount->toArray(),
            'first_pay_date' => $targetData->first_pay_date,
            'monthly_pay_amount' => $targetData->monthly_pay_amount?->toArray(),
            'pay_to_date' => $targetData->pay_to_date,
            'description' => $targetData->description,
            'target_is_done' => $targetData->target_is_done,
            'created_at' => $targetData->created_at,
            'target_category_id' => $targetData->target_category_id,
            'currency_id' => $targetData->currency_id,
            'team_id' => $targetData->team_id,
            'account_from_id' => $targetData->account_from_id,
            'user_id' => $targetData->user_id
        );
    }

    public function includeCurrency(TargetData $targetData): Item
    {
        return $this->item($targetData->currency, new CurrencyTransformer());
    }

    public function includeTargetCategory(TargetData $targetData): Item
    {
        return $this->item($targetData->target_category, new TargetCategoryTransformer());
    }

    public function includeAccountFrom(TargetData $targetData): Item
    {
        return $this->item($targetData->account_from, new AccountDataTransformer());
    }
}
