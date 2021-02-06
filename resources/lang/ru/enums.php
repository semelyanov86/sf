<?php
use Domains\Users\Enums\LanguageEnum;
use Domains\Users\Enums\SmsDayBefore;
use Domains\Users\Enums\MailDaysBeforeEnum;

return [
    LanguageEnum::class => [
        LanguageEnum::Russian => 'Русский',
        LanguageEnum::English => 'Английский',
    ],
    SmsDayBefore::class => [
        SmsDayBefore::SAME_DAY => 'В тот же день',
        SmsDayBefore::BEFORE_ONE => 'За один день',
        SmsDayBefore::BEFORE_TWO => 'За два дня',
        SmsDayBefore::BEFORE_THREE => 'За три дня',
        SmsDayBefore::BEFORE_WEEK => 'За неделю',
        SmsDayBefore::BEFORE_MONTH => 'За месяц'
    ],
    MailDaysBeforeEnum::class => [
        MailDaysBeforeEnum::THE_SAME_DAY  => 'В тот же день',
        MailDaysBeforeEnum::BEFORE_ONE_DAY  => 'За один день',
        MailDaysBeforeEnum::BEFORE_TWO_DAYS  => 'За два дня',
        MailDaysBeforeEnum::BEFORE_THREE_DAYS  => 'За три дня',
        MailDaysBeforeEnum::BEFORE_WEEK  => 'За неделю',
        MailDaysBeforeEnum::BEFORE_MONTH => 'За месяц',
    ],
    \Domains\Targets\Enums\TypeSelectEnum::class => [
        \Domains\Targets\Enums\TypeSelectEnum::PAY => 'Расход',
        \Domains\Targets\Enums\TypeSelectEnum::SAVE => 'Доход'
    ],
    \Domains\Targets\Enums\TargetStatusEnum::class => [
        \Domains\Targets\Enums\TargetStatusEnum::DEFAULT => 'По-умолчанию',
        \Domains\Targets\Enums\TargetStatusEnum::STARRED => 'Избранное'
    ]
];
