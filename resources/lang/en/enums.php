<?php
use Domains\Users\Enums\LanguageEnum;
use Domains\Users\Enums\SmsDayBefore;

return [
    LanguageEnum::class => [
        LanguageEnum::Russian => 'Russian',
        LanguageEnum::English => 'English',
    ],
    SmsDayBefore::class => [
        SmsDayBefore::SAME_DAY => 'The same day',
        SmsDayBefore::BEFORE_ONE => 'Before 1 day',
        SmsDayBefore::BEFORE_TWO => 'Before 2 days',
        SmsDayBefore::BEFORE_THREE => 'Before 3 days',
        SmsDayBefore::BEFORE_WEEK => 'Before week',
        SmsDayBefore::BEFORE_MONTH => 'Before month'
    ],
];
