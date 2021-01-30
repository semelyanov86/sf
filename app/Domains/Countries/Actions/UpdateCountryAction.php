<?php


namespace Domains\Countries\Actions;


use Domains\Countries\DataTransferObjects\CountryData;
use Domains\Countries\Models\Country;
use Domains\Countries\ViewModels\CountryViewModel;

class UpdateCountryAction extends \Parents\Actions\Action
{
    public function __invoke(Country $country, CountryData $dto): CountryViewModel
    {
        $country->update($dto->toArray());
        return new CountryViewModel(CountryData::fromModel($country));
    }
}
