<?php


namespace Domains\Targets\Enums;


use BenSampo\Enum\Contracts\LocalizedEnum;

class TypeSelectEnum extends \Parents\Enums\Enum implements LocalizedEnum
{
    const PAY = 2;

    const SAVE = 1;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
