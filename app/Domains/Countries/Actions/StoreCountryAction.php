<?php


namespace Domains\Countries\Actions;


use Domains\Countries\DataTransferObjects\CountryData;
use Domains\Countries\Models\Country;
use Domains\Countries\ViewModels\CountryViewModel;

class StoreCountryAction extends \Parents\Actions\Action
{
    public function __invoke(CountryData $dto): CountryViewModel
    {
        $country = Country::create($dto->toArray());
        return new CountryViewModel(CountryData::fromModel($country));
    }
}
