<?php


namespace Domains\Banks\DataTransferObjects;


use Domains\Banks\Http\Requests\StoreBankRequest;
use Domains\Banks\Http\Requests\UpdateBankRequest;
use Domains\Banks\Models\Bank;
use Domains\Countries\DataTransferObjects\CountryData;
use Illuminate\Support\Carbon;

final class BankData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $name;

    public ?string $description;

    public ?int $country_id;

    public ?CountryData $country;

    public ?Carbon $created_at;

    public static function fromRequest(StoreBankRequest|UpdateBankRequest $request): self
    {
        return new self($request->validated());
    }

    public static function fromModel(Bank $bank): self
    {
        return new self([
            'id' => $bank->id,
            'name' => $bank->name,
            'description' => $bank->description,
            'created_at' => $bank->created_at,
            'country_id' => $bank->country_id,
            'country' => $bank->country ? CountryData::fromModel($bank->country) : null
        ]);
    }
}
