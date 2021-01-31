<?php


namespace Domains\AutoBrands\ViewModels;


use Domains\AutoBrands\DataTransferObjects\AutoBrandDataCollection;
use Domains\AutoBrands\Models\AutoBrand;

class AutoBrandListViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AutoBrandDataCollection $autoBrand
    )
    {}

    public function autoBrands(): AutoBrandDataCollection
    {
        return $this->autoBrand ?? AutoBrandDataCollection::fromCollection(AutoBrand::all());
    }
}
