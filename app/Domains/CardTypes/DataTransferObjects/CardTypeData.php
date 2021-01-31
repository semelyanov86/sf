<?php


namespace Domains\CardTypes\DataTransferObjects;


use Domains\CardTypes\Http\Requests\StoreCardTypeRequest;
use Domains\CardTypes\Http\Requests\UpdateCardTypeRequest;
use Domains\CardTypes\Models\CardType;
use Illuminate\Support\Carbon;

final class CardTypeData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $name;

    public ?string $description;

    public ?Carbon $created_at;

    public static function fromRequest(StoreCardTypeRequest|UpdateCardTypeRequest $request): self
    {
        return new self($request->validated());
    }

    public static function fromModel(CardType $country): self
    {
        return new self([
            'id' => $country->id,
            'name' => $country->name,
            'description' => $country->description,
            'created_at' => $country->created_at
        ]);
    }

}
