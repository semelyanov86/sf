<?php


namespace Domains\Accounts\Transformers;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Accounts\DataTransferObjects\AccountTypeData;
use Domains\Accounts\Models\Account;
use Domains\Banks\DataTransferObjects\BankData;
use Domains\Banks\Transformers\BankTransformer;
use Domains\Currencies\Transformers\CurrencyTransformer;
use League\Fractal\Resource\Item;

class AccountDataTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = array('account_type', 'currency', 'bank', 'extra');

    public function transform(Account $accountData): array
    {
        return array(
            'id' => $accountData->id,
            'name' => $accountData->name,
            'description' => $accountData->description,
            'state' => $accountData->state->description,
            'start_balance' => $accountData->start_balance?->toArray(),
            'market_value' => $accountData->market_value?->toArray(),
            'extra_prefix' => $accountData->extra_prefix,
            'account_type_id' => $accountData->account_type_id,
            'currency_id' => $accountData->currency_id,
            'bank_id' => $accountData->bank_id,
            'user_id' => $accountData->user_id,
            'team_id' => $accountData->team_id
        );
    }

    public function includeAccountType(Account $accountData): Item
    {
        return $this->item($accountData->account_type, new AccountTypeDataTransformer());
    }

    public function includeCurrency(Account $accountData): Item
    {
        return $this->item($accountData->currency, new CurrencyTransformer());
    }

    public function includeBank(Account $accountData): Item
    {
        return $this->item($accountData->bank, new BankTransformer());
    }

    public function includeExtra(Account $accountData): Item
    {
        return $this->item($accountData->extra, new AccountExtraTransformer());
    }
}
