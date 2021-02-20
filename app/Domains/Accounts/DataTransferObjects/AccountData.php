<?php


namespace Domains\Accounts\DataTransferObjects;


use Domains\Accounts\Enums\AccountStateEnum;
use Domains\Accounts\Http\Requests\StoreAccountRequest;
use Domains\Accounts\Http\Requests\UpdateAccountRequest;
use Domains\Accounts\Models\Account;
use Domains\Accounts\Models\AccountsExtra;
use Domains\Banks\DataTransferObjects\BankData;
use Domains\Currencies\DataTransferObjects\CurrencyData;
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

    public static function fromRequest(StoreAccountRequest|UpdateAccountRequest $request): self
    {
        return new self([
            'name' => $request->name,
            'description' => $request->description,
            'state' => AccountStateEnum::fromValue((int) $request->state),
            'start_balance' => MoneyValueObject::fromFloat(floatval($request->start_balance)),
            'market_value' => MoneyValueObject::fromFloat(floatval($request->market_value)),
            'extra_prefix' => $request->extra_prefix,
            'account_type_id' => intval($request->account_type_id),
            'currency_id' => intval($request->currency_id),
            'bank_id' => intval($request->bank_id),
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
            'state' => AccountStateEnum::fromValue((int) $account->state),
            'start_balance' => new MoneyValueObject($account->start_balance),
            'market_value' => new MoneyValueObject($account->market_value),
            'extra_prefix' => $account->extra_prefix,
            'account_type_id' => intval($account->account_type_id),
            'currency_id' => intval($account->currency_id),
            'bank_id' => intval($account->bank_id),
            'user_id' => Auth::id(),
            'team_id' => Auth::user()->team_id,
            'account_type' => $account->account_type ? AccountTypeData::fromModel($account->account_type) : null,
            'currency' => $account->currency ? CurrencyData::fromModel($account->currency) : null,
            'bank' => $account->bank ? BankData::fromModel($account->bank) : null
        ]);
    }
}
