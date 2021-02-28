<?php


namespace Domains\Operations\DataTransferObjects;


use Domains\Accounts\DataTransferObjects\AccountData;
use Domains\Categories\DataTransferObjects\CategoryData;
use Domains\Operations\Enums\TypeSelectEnum;
use Domains\Operations\Http\Requests\StoreOperationRequest;
use Domains\Operations\Http\Requests\UpdateOperationRequest;
use Domains\Operations\Models\Operation;
use Domains\Users\DataTransferObjects\UserData;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Parents\ValueObjects\ImageValueObject;
use Parents\ValueObjects\MoneyValueObject;

final class OperationData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public MoneyValueObject $amount;

    public \Carbon\Carbon $done_at;

    public TypeSelectEnum $type;

    public ?string $description;

    public ?string $related_transactions;

    public ?int $cal_repeat;

    public int $source_account_id;

    public bool $google_sync;

    public bool $remind_operation;

    public bool $is_calendar;

    public int $category_id;

    public int $user_id;

    public int $team_id;

    public ?int $to_account_id;

    public ?ImageValueObject $attachment;

    public ?Carbon $created_at;

    public ?AccountData $source_account;

    public ?AccountData $to_account;

    public ?CategoryData $category;

    public UserData $user;

    public static function fromModel(Operation $operation): self
    {
        return new self([
            'id'=> $operation->id,
            'done_at' => $operation->done_at,
            'type' => $operation->type,
            'amount' => $operation->amount,
            'description' => $operation->description,
            'related_transactions' => $operation->related_transactions,
            'cal_repeat' => $operation->cal_repeat,
            'google_sync' => (bool) $operation->google_sync,
            'remind_operation' => (bool) $operation->remind_operation,
            'is_calendar' => (bool) $operation->is_calendar,
            'created_at' => $operation->created_at,
            'to_account_id' => $operation->to_account_id,
            'source_account_id' => (int) $operation->source_account_id,
            'source_account' => AccountData::fromModel($operation->source_account),
            'to_account' => $operation->to_account ? AccountData::fromModel($operation->to_account) : null,
            'category_id' => $operation->category_id,
            'category' => CategoryData::fromModel($operation->category),
            'user_id' => $operation->user_id,
            'user' => UserData::fromModel($operation->user),
            'attachment' => ImageValueObject::fromNative($operation->attachment),
            'team_id' => $operation->team_id
        ]);
    }

    public static function fromRequest(StoreOperationRequest|UpdateOperationRequest $request): self
    {
        return new self([
            'amount' => MoneyValueObject::fromFloat($request->amount),
            'done_at' => Carbon::make($request->done_at),
            'type' => TypeSelectEnum::fromValue((int) $request->type),
            'description' => $request->description,
            'related_transactions' => $request->related_transactions,
            'cal_repeat' => $request->cal_repeat ? intval($request->cal_repeat) : null,
            'google_sync' => $request->boolean('google_sync'),
            'remind_operation' => $request->boolean('remind_operation'),
            'is_calendar' => $request->boolean('is_calendar'),
            'source_account_id' => (int) $request->source_account_id,
            'to_account_id' => $request->to_account_id ? intval($request->to_account_id) : null,
            'category_id' => (int) $request->category_id,
            'user_id' => \Auth::id(),
            'user' => UserData::fromModel(\Auth::user()),
            'attachment' => $request->input('attachment'),
            'team_id' => self::getTeamId()
        ]);
    }
}
