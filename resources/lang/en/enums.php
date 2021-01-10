<?php
use Domains\Users\Enums\LanguageEnum;
use Domains\Users\Enums\SmsDayBefore;
use Domains\Users\Enums\MailDaysBeforeEnum;

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
    MailDaysBeforeEnum::class => [
        MailDaysBeforeEnum::THE_SAME_DAY  => 'The same day',
        MailDaysBeforeEnum::BEFORE_ONE_DAY  => 'Before 1 day',
        MailDaysBeforeEnum::BEFORE_TWO_DAYS  => 'Before 2 days',
        MailDaysBeforeEnum::BEFORE_THREE_DAYS  => 'Before 3 days',
        MailDaysBeforeEnum::BEFORE_WEEK  => 'Before week',
        MailDaysBeforeEnum::BEFORE_MONTH => 'Before month',
    ],
];
