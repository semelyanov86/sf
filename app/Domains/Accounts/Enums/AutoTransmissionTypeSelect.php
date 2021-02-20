<?php


namespace Domains\Accounts\Enums;


class AutoTransmissionTypeSelect extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const MECHANIC = 1;

    const AUTOMATIC = 2;

    const ANY = 3;

    const ROBOT = 5;

    const VARIATOR = 6;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
