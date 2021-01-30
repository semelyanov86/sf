<?php


namespace Domains\Countries\Actions;


use Domains\Countries\DataTransferObjects\CountryDataCollection;
use Domains\Countries\Models\Country;
use Domains\Countries\ViewModels\CountryListViewModel;

class GetAllCountriesAction extends \Parents\Actions\Action
{
    public function __invoke(): CountryListViewModel
    {
        $countries = CountryDataCollection::fromCollection(Country::all());
        return new CountryListViewModel($countries);
    }
}
