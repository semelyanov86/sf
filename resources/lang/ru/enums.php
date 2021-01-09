<?php
use Domains\Users\Enums\LanguageEnum;
use Domains\Users\Enums\SmsDayBefore;

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
];
