<?php


namespace Domains\Targets\Enums;


class TargetStatusEnum extends \Parents\Enums\Enum implements \BenSampo\Enum\Contracts\LocalizedEnum
{
    const DEFAULT = 0;

    const STARRED = 1;

    public static function parseDatabase($value): int
    {
        return (int) $value;
    }
}
