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
    \Domains\Targets\Enums\TypeSelectEnum::class => [
        \Domains\Targets\Enums\TypeSelectEnum::PAY => 'Pay',
        \Domains\Targets\Enums\TypeSelectEnum::SAVE => 'Save'
    ],
    \Domains\Targets\Enums\TargetStatusEnum::class => [
        \Domains\Targets\Enums\TargetStatusEnum::DEFAULT => 'Default',
        \Domains\Targets\Enums\TargetStatusEnum::STARRED => 'Starred'
    ],
    \Domains\Categories\Enums\CategoryTypeEnum::class => [
        \Domains\Categories\Enums\CategoryTypeEnum::INCOME => 'Income',
        \Domains\Categories\Enums\CategoryTypeEnum::OUTCOME => 'Outcome'
    ],
    \Domains\Accounts\Enums\AccountStateEnum::class => [
        \Domains\Accounts\Enums\AccountStateEnum::DEFAULT => 'Default',
        \Domains\Accounts\Enums\AccountStateEnum::STARRED => 'Starred',
        \Domains\Accounts\Enums\AccountStateEnum::HIDDEN => 'Hidden'
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
