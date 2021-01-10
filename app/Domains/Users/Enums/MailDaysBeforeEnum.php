<?php


namespace Domains\Users\Enums;


class MailDaysBeforeEnum extends \Parents\Enums\Enum
{
    const THE_SAME_DAY = 0;

    const BEFORE_ONE_DAY = 1;

    const BEFORE_TWO_DAYS = 2;

    const BEFORE_THREE_DAYS = 3;

    const BEFORE_WEEK = 7;

    const BEFORE_MONTH = 31;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
