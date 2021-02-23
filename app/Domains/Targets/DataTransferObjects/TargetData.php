<?php


namespace Domains\Targets\DataTransferObjects;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Targets\Enums\TargetStatusEnum;
use Domains\Targets\Enums\TypeSelectEnum;
use Domains\Targets\Http\Requests\StoreTargetRequest;
use Domains\Targets\Http\Requests\UpdateTargetRequest;
use Domains\Targets\Models\Target;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Parents\ValueObjects\ImageValueObject;
use Parents\ValueObjects\MoneyValueObject;

final class TargetData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public TypeSelectEnum $target_type;

    public string $target_name;

    public TargetStatusEnum $target_status;

    public MoneyValueObject $amount;

    public ?Carbon $first_pay_date;

    public ?MoneyValueObject $monthly_pay_amount;

    public ?Carbon $pay_to_date;

    public ?string $description;

    public bool $target_is_done;

    public ?Carbon $created_at;

    public int $target_category_id;

    public int $currency_id;

    public ?int $team_id;

    public ?int $account_from_id;

    public int $user_id;

    public ?AccountData $account_from;

    public ?CurrencyData $currency;

    public ?TargetCategoryData $target_category;

    public ImageValueObject $image;

    public static function fromRequest(StoreTargetRequest|UpdateTargetRequest $request): self
    {
        return new self([
            'target_type' => TypeSelectEnum::fromValue(intval($request->input('target_type'))),
            'target_name' => $request->input('target_name'),
            'target_status' => TargetStatusEnum::fromValue(intval($request->input('target_status'))),
            'amount' => MoneyValueObject::fromNative(intval($request->input('amount'))),
            'first_pay_date' => $request->first_pay_date ? Carbon::createFromFormat(config('panel.date_format'), $request->first_pay_date) : null,
            'monthly_pay_amount' => MoneyValueObject::fromNative(intval($request->input('monthly_pay_amount'))),
            'pay_to_date' => $request->pay_to_date ? Carbon::createFromFormat(config('panel.date_format'), $request->pay_to_date) : null,
            'description' => $request->input('description'),
            'target_is_done' => $request->boolean('target_is_done'),
            'target_category_id' => $request->input('target_category_id'),
            'currency_id' => $request->input('currency_id'),
            'account_from_id' => $request->input('account_from_id'),
            'user_id' => $request->input('user_id') ?? Auth::id(),
            'image' => ImageValueObject::fromString($request->input('image', null))
        ]);
    }

    public static function fromModel(Target $target): self
    {
        return new self([
            'id' => $target->id,
            'target_type' => $target->target_type,
            'target_name' => $target->target_name,
            'target_status' => $target->target_status,
            'amount' => new MoneyValueObject($target->amount),
            'first_pay_date' => Carbon::make($target->first_pay_date),
            'monthly_pay_amount' => $target->monthly_pay_amount ? new MoneyValueObject($target->monthly_pay_amount) : null,
            'pay_to_date' => Carbon::make($target->pay_to_date),
            'description' => $target->description,
            'target_is_done' => boolval($target->target_is_done),
            'target_category_id' => $target->target_category_id,
            'currency_id' => $target->currency_id,
            'account_from_id' => $target->account_from_id,
            'user_id' => $target->user_id ?? Auth::id(),
            'target_category' => $target->target_category ? TargetCategoryData::fromModel($target->target_category) : null,
            'currency' => $target->currency ? CurrencyData::fromModel($target->currency) : null,
            'account_from' => $target->account_from ? AccountData::fromModel($target->account_from) : null,
            'image' => ImageValueObject::fromNative($target->image)
        ]);
    }

}
