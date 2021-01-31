<?php


namespace Domains\AutoBrands\ViewModels;


use Domains\AutoBrands\DataTransferObjects\AutoBrandData;
use Domains\AutoBrands\Models\AutoBrand;

class AutoBrandViewModel extends \Parents\ViewModels\ViewModel
{
    public function __construct(
        protected ?AutoBrandData $autoBrand
    )
    {}

    public function autoBrand(): AutoBrandData
    {
        return $this->autoBrand ?? AutoBrandData::fromModel(new AutoBrand());
    }
}
