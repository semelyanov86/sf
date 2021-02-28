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
    ],
    \Domains\Categories\Enums\CategoryTypeEnum::class => [
        \Domains\Categories\Enums\CategoryTypeEnum::INCOME => 'Доход',
        \Domains\Categories\Enums\CategoryTypeEnum::OUTCOME => 'Расход'
    ],
    \Domains\Accounts\Enums\AccountStateEnum::class => [
        \Domains\Accounts\Enums\AccountStateEnum::DEFAULT => 'По умолчанию',
        \Domains\Accounts\Enums\AccountStateEnum::STARRED => 'Избранное',
        \Domains\Accounts\Enums\AccountStateEnum::HIDDEN => 'Скрытый'
    ],
    \Domains\Accounts\Enums\AccountDepositTypeSelectEnum::class => [
        \Domains\Accounts\Enums\AccountDepositTypeSelectEnum::RENEW => 'Renew',
        \Domains\Accounts\Enums\AccountDepositTypeSelectEnum::NON_RENEW => 'Non Renew'
    ],
    \Domains\Accounts\Enums\ImmovablesEstateTypeSelectEnum::class => [
        \Domains\Accounts\Enums\ImmovablesEstateTypeSelectEnum::APPARTMENT => 'Appartment',
        \Domains\Accounts\Enums\ImmovablesEstateTypeSelectEnum::HOME => 'Home'
    ],
    \Domains\Accounts\Enums\AccountCreditPaymentTypeSelect::class => [
        \Domains\Accounts\Enums\AccountCreditPaymentTypeSelect::ANNUITY => 'Аннуитентные',
        \Domains\Accounts\Enums\AccountCreditPaymentTypeSelect::DIFFERENTIABLE => 'Дифференцированные'
    ],
    \Domains\Accounts\Enums\AutoTransmissionTypeSelect::class => [
        \Domains\Accounts\Enums\AutoTransmissionTypeSelect::ANY => 'Any',
        \Domains\Accounts\Enums\AutoTransmissionTypeSelect::AUTOMATIC => 'Automatic',
        \Domains\Accounts\Enums\AutoTransmissionTypeSelect::MECHANIC => 'Mechanic',
        \Domains\Accounts\Enums\AutoTransmissionTypeSelect::ROBOT => 'Robot',
        \Domains\Accounts\Enums\AutoTransmissionTypeSelect::VARIATOR => 'Variator'
    ],
    \Domains\Accounts\Enums\AutoFuelTypeSelect::class => [
        \Domains\Accounts\Enums\AutoFuelTypeSelect::BENZINE => 'Benzine',
        \Domains\Accounts\Enums\AutoFuelTypeSelect::ANY => 'Any',
        \Domains\Accounts\Enums\AutoFuelTypeSelect::BENZINE_GAZ => 'Benzine/Gaz',
        \Domains\Accounts\Enums\AutoFuelTypeSelect::CARBURETOR => 'Carburetor',
        \Domains\Accounts\Enums\AutoFuelTypeSelect::DIESEL => 'Diesel',
        \Domains\Accounts\Enums\AutoFuelTypeSelect::ELECTRO => 'Electro',
        \Domains\Accounts\Enums\AutoFuelTypeSelect::GAZ => 'Gaz',
        \Domains\Accounts\Enums\AutoFuelTypeSelect::HYBRID => 'Hybrid',
        \Domains\Accounts\Enums\AutoFuelTypeSelect::INJECTOR => 'Injector'
    ],
    \Domains\Accounts\Enums\AccountInterestPeriodSelect::class => [
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::END_OF_PERIOD => 'End of period',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_DAY => 'Every Day',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_WEEK => 'Every Week',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_MONTH_OPEN_DAY => 'Every Month at open day',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_MONTH_END => 'Every month at the end of month',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_MONTH_FIRST => 'Every month at first day of month',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_QUARTER_OPEN => 'Every quarter at open day',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_QUARTER_END => 'Every quarter at the end of quarter',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_SIX_MONTH => 'Every 6 month',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::EVERY_YEAR => 'Every year',
        \Domains\Accounts\Enums\AccountInterestPeriodSelect::AFTER_CUSTOM_INTERVAL => 'After Custom Interval',
    ],
    \Domains\Operations\Enums\TypeSelectEnum::class => [
        \Domains\Operations\Enums\TypeSelectEnum::INCOME => 'Income',
        \Domains\Operations\Enums\TypeSelectEnum::EXPENSE => 'Expense',
        \Domains\Operations\Enums\TypeSelectEnum::TRANSACTION => 'Transaction'
    ]
];
