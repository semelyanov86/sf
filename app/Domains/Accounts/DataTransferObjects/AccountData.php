<?php
declare(strict_types=1);

namespace Domains\Accounts\DataTransferObjects;


use Domains\Accounts\Enums\AccountStateEnum;
use Domains\Accounts\Http\Requests\StoreAccountRequest;
use Domains\Accounts\Http\Requests\UpdateAccountRequest;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Domains\Banks\DataTransferObjects\BankData;
use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Operations\DataTransferObjects\OperationDataCollection;
use Domains\Targets\DataTransferObjects\TargetDataCollection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Parents\ValueObjects\MoneyValueObject;

final class AccountData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $name;

    public ?string $description;

    public AccountStateEnum $state;

    public MoneyValueObject $start_balance;

    public MoneyValueObject $market_value;

    public ?string $extra_prefix;

    public ?Carbon $created_at;

    public int $account_type_id;

    public int $currency_id;

    public int $bank_id;

    public int $user_id;

    public ?int $team_id;

    public ?AccountTypeData $account_type;

    public ?CurrencyData $currency;

    public ?BankData $bank;

    public ?AccountExtraData $extra;

    public ?Carbon $updated_at;

    public ?Carbon $deleted_at;

    public static function fromRequest(StoreAccountRequest|UpdateAccountRequest $request): self
    {
        return new self([
            'name' => $request->input('data.attributes.name'),
            'description' => $request->input('data.attributes.description'),
            'state' => AccountStateEnum::fromValue((int) $request->input('data.attributes.state')),
            'start_balance' => MoneyValueObject::fromFloat(floatval($request->input('data.attributes.start_balance'))),
            'market_value' => MoneyValueObject::fromFloat(floatval($request->input('data.attributes.market_value'))),
            'extra_prefix' => $request->input('data.attributes.extra_prefix'),
            'account_type_id' => intval($request->input('data.attributes.account_type_id')),
            'currency_id' => intval($request->input('data.attributes.currency_id')),
            'bank_id' => intval($request->input('data.attributes.bank_id')),
            'user_id' => Auth::id(),
            'team_id' => Auth::user()->team_id
        ]);
    }

    public static function fromModel(Account $account): self
    {
        return new self([
            'id' => $account->id,
            'name' => $account->name,
            'description' => $account->description,
            'state' => $account->state,
            'start_balance' => $account->start_balance,
            'market_value' => $account->market_value,
            'extra_prefix' => $account->extra_prefix,
            'account_type_id' => intval($account->account_type_id),
            'currency_id' => intval($account->currency_id),
            'bank_id' => intval($account->bank_id),
            'user_id' => $account->user_id ?? Auth::id(),
            'team_id' => $account->team_id ?? Auth::user()->team_id,
            'account_type' => $account->account_type ? AccountTypeData::fromModel($account->account_type) : null,
            'currency' => $account->currency ? CurrencyData::fromModel($account->currency) : null,
            'bank' => $account->bank ? BankData::fromModel($account->bank) : null
        ]);
    }
}
