<?php


namespace Domains\Currencies\DataTransferObjects;


use Domains\Currencies\Http\Requests\StoreCurrencyRequest;
use Domains\Currencies\Http\Requests\UpdateCurrencyRequest;
use Domains\Currencies\Models\Currency;
use Domains\Users\DataTransferObjects\UserDataCollection;
use Illuminate\Support\Carbon;

final class CurrencyData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $code;

    public string $name;

    public ?float $course;

    public ?Carbon $update_date;

    public ?Carbon $created_at;

    public ?Carbon $updated_at;

    public ?UserDataCollection $users;

    public ?Carbon $deleted_at;

    public static function fromRequest(StoreCurrencyRequest|UpdateCurrencyRequest $request): self
    {
        return new self($request->validated());
    }

    public static function fromModel(Currency $currency): self
    {
        return new self([
            'id' => $currency->id,
            'code' => $currency->code,
            'course' => $currency->course,
            'name' => $currency->name,
            'update_date' => $currency->update_date,
            'users' => UserDataCollection::fromCollection($currency->users)
        ]);
    }
}
