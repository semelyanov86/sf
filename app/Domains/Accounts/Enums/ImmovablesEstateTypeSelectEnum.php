<?php


namespace Domains\Accounts\Enums;


class ImmovablesEstateTypeSelectEnum extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const HOME = 0;
    
    const APPARTMENT = 1;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
