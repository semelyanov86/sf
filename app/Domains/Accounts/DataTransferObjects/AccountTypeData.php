<?php


namespace Domains\Accounts\DataTransferObjects;


use Domains\Accounts\Http\Requests\StoreAccountTypeRequest;
use Domains\Accounts\Http\Requests\UpdateAccountTypeRequest;
use Domains\Accounts\Models\AccountType;
use Illuminate\Support\Carbon;

final class AccountTypeData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $name;

    public string $parent_description;

    public ?Carbon $created_at;

    public static function fromRequest(StoreAccountTypeRequest|UpdateAccountTypeRequest $request): self
    {
        return new self([
            'name' => $request->name,
            'parent_description' => $request->parent_description
        ]);
    }

    public static function fromModel(AccountType $accountType): self
    {
        return new self([
            'id' => $accountType->id,
            'name' => $accountType->name,
            'parent_description' => $accountType->parent_description,
            'created_at' => $accountType->created_at
        ]);
    }
}
