<?php


namespace Domains\Accounts\Enums;


class AutoFuelTypeSelect extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const BENZINE = 1;
    
    const DIESEL = 2;
    
    const GAZ = 3;
    
    const ANY = 4;
    
    const INJECTOR = 5;
    
    const CARBURETOR = 6;
    
    const HYBRID = 7;
    
    const BENZINE_GAZ = 8;
    
    const ELECTRO = 9;
    
    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
