<?php


namespace Domains\Countries\Transformers;


use Domains\Countries\DataTransferObjects\CountryData;

class CountryTransformer extends \Parents\Transformers\Transformer
{
    public function transform(CountryData $countryData): array
    {
        return array(
            'id' => $countryData->id,
            'name' => $countryData->name,
            'short_code' => $countryData->short_code
        );
    }
}
