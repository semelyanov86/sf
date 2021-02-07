<?php


namespace Domains\Categories\Enums;


class CategoryTypeEnum extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const INCOME = 1;
    
    const OUTCOME = -1;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
