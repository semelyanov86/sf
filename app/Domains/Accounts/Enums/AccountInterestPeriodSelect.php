<?php


namespace Domains\Accounts\Enums;


class AccountInterestPeriodSelect extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const END_OF_PERIOD = 0;

    const EVERY_DAY = 1;

    const EVERY_WEEK = 2;

    const EVERY_MONTH_OPEN_DAY = 3;

    const EVERY_MONTH_END = 4;

    const EVERY_MONTH_FIRST = 5;

    const EVERY_QUARTER_OPEN = 6;

    const EVERY_QUARTER_END = 7;

    const EVERY_SIX_MONTH = 8;

    const EVERY_YEAR = 9;

    const AFTER_CUSTOM_INTERVAL = 10;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
