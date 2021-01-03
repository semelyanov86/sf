<?php

return [
    'userManagement' => [
        'title'          => 'Управление пользователями',
        'title_singular' => 'Управление пользователями',
    ],
    'permission'     => [
        'title'          => 'Разрешения',
        'title_singular' => 'Разрешение',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Заголовок',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'           => [
        'title'          => 'Роли',
        'title_singular' => 'Роль',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Название',
            'title_helper'       => ' ',
            'permissions'        => 'Разрешения',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'           => [
        'title'          => 'Пользователи',
        'title_singular' => 'Пользователь',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Имя',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Пароль',
            'password_helper'           => ' ',
            'roles'                     => 'Роли',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'approved'                  => 'Одобрен',
            'approved_helper'           => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
            'team'                      => 'Команда',
            'team_helper'               => ' ',
            'login'                     => 'Логин',
            'login_helper'              => ' ',
            'operations_number'         => 'Количество операций',
            'operations_number_helper'  => 'Количество операций на одной странице',
            'budget_day_start'          => 'День начала бюджета',
            'budget_day_start_helper'   => 'Day of budget start',
            'primary_currency'          => 'Основная валюта',
            'primary_currency_helper'   => ' ',
            'timezone'                  => 'Временная зона',
            'timezone_helper'           => ' ',
            'phone'                     => 'Номер телефона',
            'phone_helper'              => ' ',
            'google_sync'               => 'Google Sync',
            'google_sync_helper'        => ' ',
            'email_notify'              => 'Уведомление по электронной почте',
            'email_notify_helper'       => ' ',
            'mail_days_before'          => 'Mail Days Before',
            'mail_days_before_helper'   => ' ',
            'mail_time'                 => 'Mail Time',
            'mail_time_helper'          => ' ',
            'sms_notify'                => 'Уведомление по смс',
            'sms_notify_helper'         => ' ',
            'sms_days_before'           => 'Sms Days Before',
            'sms_days_before_helper'    => ' ',
            'sms_time'                  => 'Sms Time',
            'sms_time_helper'           => ' ',
            'language'                  => 'Language',
            'language_helper'           => ' ',
        ],
    ],
    'team'           => [
        'title'          => 'Команды',
        'title_singular' => 'Команда',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'name'              => 'Название',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
        ],
    ],
    'country'        => [
        'title'          => 'Страны',
        'title_singular' => 'Страна',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Наименование',
            'name_helper'       => ' ',
            'short_code'        => 'Код',
            'short_code_helper' => ' ',
            'created_at'        => 'Дата создания',
            'created_at_helper' => ' ',
            'updated_at'        => 'Дата обновления',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'currency'       => [
        'title'          => 'Валюты',
        'title_singular' => 'Валюта',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'code'               => 'Код',
            'code_helper'        => ' ',
            'course'             => 'Курс валюты',
            'course_helper'      => ' ',
            'update_date'        => 'Дата обновления курса',
            'update_date_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'users'              => 'Пользователи',
            'users_helper'       => ' ',
            'name'               => 'Наименование',
            'name_helper'        => ' ',
        ],
    ],
    'bank'           => [
        'title'          => 'Банки',
        'title_singular' => 'Банк',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Наименование',
            'name_helper'        => ' ',
            'description'        => 'Описание',
            'description_helper' => ' ',
            'country'            => 'Страна',
            'country_helper'     => ' ',
            'created_at'         => 'Дата создания',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Дата обновления',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Удалено',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'category'       => [
        'title'          => 'Категории',
        'title_singular' => 'Категория',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'Наименование',
            'name_helper'         => ' ',
            'type'                => 'Тип категории',
            'type_helper'         => 'Тип категории',
            'is_hidden'           => 'Скрытая',
            'is_hidden_helper'    => ' ',
            'parent'              => 'Родительская категория',
            'parent_helper'       => ' ',
            'sys_category'        => 'Системная категория',
            'sys_category_helper' => ' ',
            'last_used_at'        => 'Последняя дата использования',
            'last_used_at_helper' => ' ',
            'created_at'          => 'Дата создания',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Дата обновления',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Удалено',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'targetCategory' => [
        'title'          => 'Категории целей',
        'title_singular' => 'Категория цели',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'target_category_name'         => 'Наименование',
            'target_category_name_helper'  => ' ',
            'target_category_type'         => 'Тип',
            'target_category_type_helper'  => ' ',
            'target_category_image'        => 'Изображение',
            'target_category_image_helper' => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'budget'         => [
        'title'          => 'Бюджеты',
        'title_singular' => 'Бюджет',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Категория',
            'category_helper'   => ' ',
            'plan'              => 'План',
            'plan_helper'       => ' ',
            'user'              => 'Пользователь',
            'user_helper'       => ' ',
            'created_at'        => 'Дата создания',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'team'              => 'Группа',
            'team_helper'       => ' ',
        ],
    ],
    'target'         => [
        'title'          => 'Цели',
        'title_singular' => 'Цель',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'target_category'           => 'Категория',
            'target_category_helper'    => ' ',
            'currency'                  => 'Валюта',
            'currency_helper'           => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'team'                      => 'Team',
            'team_helper'               => ' ',
            'account_from'              => 'Счёт',
            'account_from_helper'       => ' ',
            'user'                      => 'Пользователь',
            'user_helper'               => ' ',
            'target_type'               => 'Тип цели',
            'target_type_helper'        => ' ',
            'target_name'               => 'Название цели',
            'target_name_helper'        => ' ',
            'target_status'             => 'Статус',
            'target_status_helper'      => ' ',
            'amount'                    => 'Сумма',
            'amount_helper'             => ' ',
            'first_pay_date'            => 'Дата первого платежа',
            'first_pay_date_helper'     => ' ',
            'monthly_pay_amount'        => 'Сумма ежемесячного платежа',
            'monthly_pay_amount_helper' => ' ',
            'pay_to_date'               => 'Оплатить до',
            'pay_to_date_helper'        => ' ',
            'description'               => 'Описание',
            'description_helper'        => ' ',
            'image'                     => 'Изображение',
            'image_helper'              => ' ',
            'target_is_done'            => 'Цель выполнена',
            'target_is_done_helper'     => ' ',
        ],
    ],
    'account'        => [
        'title'          => 'Счета',
        'title_singular' => 'Счёт',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Наименование',
            'name_helper'          => ' ',
            'created_at'           => 'Дата создания',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Дата обновления',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'account_type'         => 'Тип счёта',
            'account_type_helper'  => ' ',
            'state'                => 'Статус',
            'state_helper'         => ' ',
            'description'          => 'Описание',
            'description_helper'   => ' ',
            'start_balance'        => 'Начальный баланс',
            'start_balance_helper' => ' ',
            'currency'             => 'Валюта',
            'currency_helper'      => ' ',
            'bank'                 => 'Банк',
            'bank_helper'          => ' ',
            'market_value'         => 'Рыночная стоимость',
            'market_value_helper'  => ' ',
            'extra_prefix'         => 'Префикс для дополнительных данных',
            'extra_prefix_helper'  => ' ',
            'team'                 => 'Группа',
            'team_helper'          => ' ',
        ],
    ],
    'accountType'    => [
        'title'          => 'Типы счетов',
        'title_singular' => 'Тип счёта',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Наименование',
            'name_helper'               => ' ',
            'parent_description'        => 'Родительская категория',
            'parent_description_helper' => ' ',
            'created_at'                => 'Дата создания',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Дата обновления',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'cardType'       => [
        'title'          => 'Типы карт',
        'title_singular' => 'Тип карты',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Наименование',
            'name_helper'        => ' ',
            'description'        => 'Описание',
            'description_helper' => ' ',
            'created_at'         => 'Дата создания',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Дата обновления',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'additionalData' => [
        'title'          => 'Дополнительные справочники',
        'title_singular' => 'Дополнительный справочник',
    ],
    'autoBrand'      => [
        'title'          => 'Марки автомобилей',
        'title_singular' => 'Марка автомобиля',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Наименование',
            'name_helper'        => ' ',
            'description'        => 'Описание',
            'description_helper' => ' ',
            'created_at'         => 'Дата создания',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Дата обновления',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'accountsExtra'  => [
        'title'          => 'Доп информация о счетах',
        'title_singular' => 'Доп информация о счетах',
        'fields'         => [
            'id'                                        => 'ID',
            'id_helper'                                 => ' ',
            'card_type'                                 => 'Тип карты',
            'card_type_helper'                          => ' ',
            'card_expire_date'                          => 'Срок действия карты',
            'card_expire_date_helper'                   => ' ',
            'card_year_cost'                            => 'Стоимость годового обслуживания',
            'card_year_cost_helper'                     => ' ',
            'card_rate_balance'                         => 'Годовая ставка на остаток, %',
            'card_rate_balance_helper'                  => ' ',
            'card_atm_commission'                       => 'Снятие наличных в банкомате банка, %',
            'card_atm_commission_helper'                => ' ',
            'card_other_atm_commission'                 => 'Снятие наличных в других банкоматах, %',
            'card_other_atm_commission_helper'          => ' ',
            'card_credit_limit'                         => 'Кредитный лимит',
            'card_credit_limit_helper'                  => ' ',
            'card_credit_interest_rate'                 => 'Годовая ставка, %',
            'card_credit_interest_rate_helper'          => ' ',
            'created_at'                                => 'Дата создания',
            'created_at_helper'                         => ' ',
            'updated_at'                                => 'Дата обновления',
            'updated_at_helper'                         => ' ',
            'deleted_at'                                => 'Deleted at',
            'deleted_at_helper'                         => ' ',
            'team'                                      => 'Team',
            'team_helper'                               => ' ',
            'card_credit_grace_period'                  => 'Льготный период, дней',
            'card_credit_grace_period_helper'           => ' ',
            'card_credit_min_payment_percent'           => 'Минимальный платёж, %',
            'card_credit_min_payment_percent_helper'    => ' ',
            'card_credit_min_payment_day'               => 'День минимального платежа',
            'card_credit_min_payment_day_helper'        => ' ',
            'card_credit_annual_service_cost'           => 'Стоимость ежегодного обслуживания',
            'card_credit_annual_service_cost_helper'    => ' ',
            'account_open_date'                         => 'Дата открытия счёта',
            'account_open_date_helper'                  => ' ',
            'account_interest_rate'                     => 'Годовая ставка, %',
            'account_interest_rate_helper'              => ' ',
            'account_close_date'                        => 'Дата закрытия',
            'account_close_date_helper'                 => ' ',
            'account_is_capitalization'                 => 'Капитализация',
            'account_is_capitalization_helper'          => ' ',
            'account_interest_period'                   => 'Период начисления %',
            'account_interest_period_helper'            => ' ',
            'account_deposit_type'                      => 'Тип депозита',
            'account_deposit_type_helper'               => ' ',
            'account_credit_payment_type'               => 'Тип плитежа',
            'account_credit_payment_type_helper'        => ' ',
            'account_credit_one_time_commission'        => 'Единоразовая комиссия, %',
            'account_credit_one_time_commission_helper' => ' ',
            'account_credit_monthly_commission'         => 'Ежемесячная комиссия, %',
            'account_credit_monthly_commission_helper'  => ' ',
            'account_credit_payment_day'                => 'День очередного платежа',
            'account_credit_payment_day_helper'         => ' ',
            'loan_give_date'                            => 'Дата выдачи займа',
            'loan_give_date_helper'                     => ' ',
            'loan_take_date'                            => 'Дата погашения займа',
            'loan_take_date_helper'                     => ' ',
            'loan_debitor_email'                        => 'Email заёмщика',
            'loan_debitor_email_helper'                 => ' ',
            'loan_debitor_phone'                        => 'Телефон заёмщика',
            'loan_debitor_phone_helper'                 => ' ',
            'loan_interest_rate'                        => 'Процентная ставка',
            'loan_interest_rate_helper'                 => ' ',
            'immovables_estate_type'                    => 'Тип недвижимости',
            'immovables_estate_type_helper'             => ' ',
            'immovables_living_space'                   => 'Площадь общая, кв. м',
            'immovables_living_space_helper'            => ' ',
            'immovables_usable_space'                   => 'Площадь полезная, кв. м',
            'immovables_usable_space_helper'            => ' ',
            'immovables_landing_plot'                   => 'Immovables Landing Plot',
            'immovables_landing_plot_helper'            => ' ',
            'immovables_distance_to_city'               => 'Удалённость от города, км',
            'immovables_distance_to_city_helper'        => ' ',
            'immovables_floor'                          => 'Этаж',
            'immovables_floor_helper'                   => ' ',
            'immovables_count_floor'                    => 'Этажность дома',
            'immovables_count_floor_helper'             => ' ',
            'immovables_city'                           => 'Город',
            'immovables_city_helper'                    => ' ',
            'immovables_district'                       => 'Район',
            'immovables_district_helper'                => ' ',
            'immovables_purchase_date'                  => 'Дата покупки',
            'immovables_purchase_date_helper'           => ' ',
            'auto_transport_type'                       => 'Тип имущества',
            'auto_transport_type_helper'                => ' ',
            'auto_brand'                                => 'Марка',
            'auto_brand_helper'                         => ' ',
            'auto_model'                                => 'Модель',
            'auto_model_helper'                         => ' ',
            'auto_modification'                         => 'Модификация',
            'auto_modification_helper'                  => ' ',
            'auto_fuel_type'                            => 'Тип топлива',
            'auto_fuel_type_helper'                     => ' ',
            'auto_transmission_type'                    => 'Тип коробки передач',
            'auto_transmission_type_helper'             => ' ',
            'auto_color'                                => 'Цвет',
            'auto_color_helper'                         => ' ',
            'auto_year'                                 => 'Год выпуска',
            'auto_year_helper'                          => ' ',
            'auto_engine_size'                          => 'Объём двигателя, л',
            'auto_engine_size_helper'                   => ' ',
            'auto_region'                               => 'Регион регистрации',
            'auto_region_helper'                        => ' ',
            'auto_mileage'                              => 'Пробег',
            'auto_mileage_helper'                       => ' ',
            'auto_purchase_date'                        => 'Дата покупки',
            'auto_purchase_date_helper'                 => ' ',
        ],
    ],
    'operation'      => [
        'title'          => 'Операции',
        'title_singular' => 'Операция',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'amount'                      => 'Сумма',
            'amount_helper'               => ' ',
            'done_at'                     => 'Дата операции',
            'done_at_helper'              => ' ',
            'source_account'              => 'Счёт списания',
            'source_account_helper'       => ' ',
            'to_account'                  => 'Счёт назначения',
            'to_account_helper'           => ' ',
            'type'                        => 'Тип',
            'type_helper'                 => ' ',
            'category'                    => 'Категория',
            'category_helper'             => ' ',
            'description'                 => 'Описание',
            'description_helper'          => ' ',
            'user'                        => 'Пользователь',
            'user_helper'                 => ' ',
            'attachment'                  => 'Вложение',
            'attachment_helper'           => ' ',
            'related_transactions'        => 'Связанные трансакции',
            'related_transactions_helper' => ' ',
            'cal_repeat'                  => 'Повторение в календаре',
            'cal_repeat_helper'           => ' ',
            'google_sync'                 => 'Google Sync',
            'google_sync_helper'          => ' ',
            'remind_operation'            => 'Напоминание об операции',
            'remind_operation_helper'     => ' ',
            'is_calendar'                 => 'В календаре',
            'is_calendar_helper'          => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'team'                        => 'Team',
            'team_helper'                 => ' ',
        ],
    ],
    'hiddenCategory' => [
        'title'          => 'Скрытие категорий',
        'title_singular' => 'Скрытые категории',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Категория',
            'category_helper'   => ' ',
            'user'              => 'Пользователь',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
