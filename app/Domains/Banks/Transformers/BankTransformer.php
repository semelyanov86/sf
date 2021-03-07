<?php


namespace Domains\Banks\Transformers;


use Domains\Banks\DataTransferObjects\BankData;
use Domains\Banks\Models\Bank;
use Domains\Countries\Transformers\CountryTransformer;

final class BankTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = ['country'];

    public function transform(BankData|Bank $bankData): array
    {
        return array(
            'id' => $bankData->id,
            'name' => $bankData->name,
            'description' => $bankData->description,
            'created_at' => $bankData->created_at
        );
    }

    public function includeCountry(BankData|Bank $bankData): \League\Fractal\Resource\Item
    {
        return $this->item($bankData->country, new CountryTransformer());
    }
}
