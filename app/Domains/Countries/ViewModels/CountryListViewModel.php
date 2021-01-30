<?php


namespace Domains\Countries\ViewModels;


use Domains\Countries\DataTransferObjects\CountryDataCollection;
use Domains\Countries\Models\Country;

class CountryListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?CountryDataCollection $countries
    )
    {}

    public function countries(): CountryDataCollection
    {
        return $this->countries ?? CountryDataCollection::fromCollection(Country::all());
    }
}
