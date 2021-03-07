<?php


namespace Domains\Currencies\Transformers;


use Domains\Currencies\DataTransferObjects\CurrencyData;
use Domains\Currencies\Models\Currency;
use Domains\Users\DataTransferObjects\UserData;
use Domains\Users\Transformers\UserTransformer;

class CurrencyTransformer extends \Parents\Transformers\Transformer
{
    protected $availableIncludes = ['users'];

    public function transform(CurrencyData|Currency $currencyData): array
    {
        return array(
            'id' => $currencyData->id,
            'name' => $currencyData->name,
            'code' => $currencyData->code,
            'course' => $currencyData->course,
            'updated_date' => $currencyData->update_date
        );
    }

    public function includeUsers(CurrencyData|Currency $currencyData): \League\Fractal\Resource\Collection
    {
        return $this->collection($currencyData->users, new UserTransformer());
    }
}
