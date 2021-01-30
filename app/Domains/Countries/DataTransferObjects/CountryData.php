<?php


namespace Domains\Countries\DataTransferObjects;


use Domains\Countries\Http\Requests\StoreCountryRequest;
use Domains\Countries\Http\Requests\UpdateCountryRequest;
use Domains\Countries\Models\Country;
use Illuminate\Support\Carbon;

final class CountryData extends \Parents\DataTransferObjects\ObjectData
{
    public int $id;

    public string $name;

    public string $short_code;

    public ?Carbon $created_at;

    public static function fromRequest(StoreCountryRequest|UpdateCountryRequest $request): self
    {
        return new self($request->validated());
    }

    public static function fromModel(Country $country): self
    {
        return new self([
            'id' => $country->id,
            'name' => $country->name,
            'short_code' => $country->short_code,
            'created_at' => $country->created_at
        ]);
    }
}
