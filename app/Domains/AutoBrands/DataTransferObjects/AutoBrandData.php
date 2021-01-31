<?php


namespace Domains\AutoBrands\DataTransferObjects;


use Domains\AutoBrands\Http\Requests\StoreAutoBrandRequest;
use Domains\AutoBrands\Http\Requests\UpdateAutoBrandRequest;
use Domains\AutoBrands\Models\AutoBrand;
use Illuminate\Support\Carbon;

final class AutoBrandData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $name;

    public ?string $description;

    public ?Carbon $created_at;

    public static function fromRequest(StoreAutoBrandRequest|UpdateAutoBrandRequest $request): self
    {
        return new self($request->validated());
    }

    public static function fromModel(AutoBrand $autoBrand): self
    {
        return new self([
            'id' => $autoBrand->id,
            'name' => $autoBrand->name,
            'description' => $autoBrand->description,
            'created_at' => $autoBrand->created_at
        ]);
    }
}
