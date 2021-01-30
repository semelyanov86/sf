<?php


namespace Domains\Countries\ViewModels;


use Domains\Countries\DataTransferObjects\CountryData;
use Domains\Countries\Models\Country;

class CountryViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?CountryData $country
    )
    {}

    public function country(): CountryData
    {
        return $this->country ?? CountryData::fromModel(new Country());
    }
}
