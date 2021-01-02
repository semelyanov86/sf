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
            'title'             => 'Title',
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
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
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
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
            'team'                      => 'Team',
            'team_helper'               => ' ',
            'login'                     => 'Login',
            'login_helper'              => ' ',
            'operations_number'         => 'Operations Number',
            'operations_number_helper'  => 'Number of operations per page',
            'budget_day_start'          => 'Budget Day Start',
            'budget_day_start_helper'   => 'Day of budget start',
            'primary_currency'          => 'Primary Currency',
            'primary_currency_helper'   => ' ',
            'timezone'                  => 'Timezone',
            'timezone_helper'           => ' ',
            'phone'                     => 'Phone',
            'phone_helper'              => ' ',
            'google_sync'               => 'Google Sync',
            'google_sync_helper'        => ' ',
            'email_notify'              => 'Email Notify',
            'email_notify_helper'       => ' ',
            'mail_days_before'          => 'Mail Days Before',
            'mail_days_before_helper'   => ' ',
            'mail_time'                 => 'Mail Time',
            'mail_time_helper'          => ' ',
            'sms_notify'                => 'Sms Notify',
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
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
        ],
    ],
    'country'        => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'short_code'        => 'Short Code',
            'short_code_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'currency'       => [
        'title'          => 'Currencies',
        'title_singular' => 'Currency',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'code'               => 'Code',
            'code_helper'        => ' ',
            'course'             => 'Course',
            'course_helper'      => ' ',
            'update_date'        => 'Update Date',
            'update_date_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'users'              => 'Users',
            'users_helper'       => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
        ],
    ],
    'bank'           => [
        'title'          => 'Banks',
        'title_singular' => 'Bank',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'country'            => 'Country',
            'country_helper'     => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'category'       => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'type'                => 'Type',
            'type_helper'         => 'Type of category',
            'is_hidden'           => 'Is Hidden',
            'is_hidden_helper'    => ' ',
            'parent'              => 'Parent',
            'parent_helper'       => ' ',
            'sys_category'        => 'System Category',
            'sys_category_helper' => ' ',
            'last_used_at'        => 'Last Used At',
            'last_used_at_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'targetCategory' => [
        'title'          => 'Target Categories',
        'title_singular' => 'Target Category',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'target_category_name'         => 'Target Category Name',
            'target_category_name_helper'  => ' ',
            'target_category_type'         => 'Target Category Type',
            'target_category_type_helper'  => ' ',
            'target_category_image'        => 'Target Category Image',
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
        'title'          => 'Budgets',
        'title_singular' => 'Budget',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'plan'              => 'Plan',
            'plan_helper'       => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'team'              => 'Team',
            'team_helper'       => ' ',
        ],
    ],
    'target'         => [
        'title'          => 'Targets',
        'title_singular' => 'Target',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'target_category'           => 'Target Category',
            'target_category_helper'    => ' ',
            'currency'                  => 'Currency',
            'currency_helper'           => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'team'                      => 'Team',
            'team_helper'               => ' ',
            'account_from'              => 'Account From',
            'account_from_helper'       => ' ',
            'user'                      => 'User',
            'user_helper'               => ' ',
            'target_type'               => 'Target Type',
            'target_type_helper'        => ' ',
            'target_name'               => 'Target Name',
            'target_name_helper'        => ' ',
            'target_status'             => 'Target Status',
            'target_status_helper'      => ' ',
            'amount'                    => 'Amount',
            'amount_helper'             => ' ',
            'first_pay_date'            => 'First Pay Date',
            'first_pay_date_helper'     => ' ',
            'monthly_pay_amount'        => 'Monthly Pay Amount',
            'monthly_pay_amount_helper' => ' ',
            'pay_to_date'               => 'Pay To Date',
            'pay_to_date_helper'        => ' ',
            'description'               => 'Description',
            'description_helper'        => ' ',
            'image'                     => 'Image',
            'image_helper'              => ' ',
            'target_is_done'            => 'Target Is Done',
            'target_is_done_helper'     => ' ',
        ],
    ],
    'account'        => [
        'title'          => 'Accounts',
        'title_singular' => 'Account',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'account_type'         => 'Account Type',
            'account_type_helper'  => ' ',
            'state'                => 'State',
            'state_helper'         => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'start_balance'        => 'Start Balance',
            'start_balance_helper' => ' ',
            'currency'             => 'Currency',
            'currency_helper'      => ' ',
            'bank'                 => 'Bank',
            'bank_helper'          => ' ',
            'market_value'         => 'Market Value',
            'market_value_helper'  => ' ',
            'extra_prefix'         => 'Extra Prefix',
            'extra_prefix_helper'  => ' ',
            'team'                 => 'Team',
            'team_helper'          => ' ',
        ],
    ],
    'accountType'    => [
        'title'          => 'Account Types',
        'title_singular' => 'Account Type',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'parent_description'        => 'Parent Description',
            'parent_description_helper' => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'cardType'       => [
        'title'          => 'Card Types',
        'title_singular' => 'Card Type',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'additionalData' => [
        'title'          => 'Additional Data',
        'title_singular' => 'Additional Data',
    ],
    'autoBrand'      => [
        'title'          => 'Auto Brands',
        'title_singular' => 'Auto Brand',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'accountsExtra'  => [
        'title'          => 'Accounts Extra',
        'title_singular' => 'Accounts Extra',
        'fields'         => [
            'id'                                        => 'ID',
            'id_helper'                                 => ' ',
            'card_type'                                 => 'Card Type',
            'card_type_helper'                          => ' ',
            'card_expire_date'                          => 'Card Expire Date',
            'card_expire_date_helper'                   => ' ',
            'card_year_cost'                            => 'Card Year Cost',
            'card_year_cost_helper'                     => ' ',
            'card_rate_balance'                         => 'Card Rate Balance',
            'card_rate_balance_helper'                  => ' ',
            'card_atm_commission'                       => 'Card Atm Commission',
            'card_atm_commission_helper'                => ' ',
            'card_other_atm_commission'                 => 'Card Other Atm Commission',
            'card_other_atm_commission_helper'          => ' ',
            'card_credit_limit'                         => 'Card Credit Limit',
            'card_credit_limit_helper'                  => ' ',
            'card_credit_interest_rate'                 => 'Card Credit Interest Rate',
            'card_credit_interest_rate_helper'          => ' ',
            'created_at'                                => 'Created at',
            'created_at_helper'                         => ' ',
            'updated_at'                                => 'Updated at',
            'updated_at_helper'                         => ' ',
            'deleted_at'                                => 'Deleted at',
            'deleted_at_helper'                         => ' ',
            'team'                                      => 'Team',
            'team_helper'                               => ' ',
            'card_credit_grace_period'                  => 'Card Credit Grace Period',
            'card_credit_grace_period_helper'           => ' ',
            'card_credit_min_payment_percent'           => 'Card Credit Min Payment Percent',
            'card_credit_min_payment_percent_helper'    => ' ',
            'card_credit_min_payment_day'               => 'Card Credit Min Payment Day',
            'card_credit_min_payment_day_helper'        => ' ',
            'card_credit_annual_service_cost'           => 'Card Credit Annual Service Cost',
            'card_credit_annual_service_cost_helper'    => ' ',
            'account_open_date'                         => 'Account Open Date',
            'account_open_date_helper'                  => ' ',
            'account_interest_rate'                     => 'Account Interest Rate',
            'account_interest_rate_helper'              => ' ',
            'account_close_date'                        => 'Account Close Date',
            'account_close_date_helper'                 => ' ',
            'account_is_capitalization'                 => 'Account Is Capitalization',
            'account_is_capitalization_helper'          => ' ',
            'account_interest_period'                   => 'Account Interest Period',
            'account_interest_period_helper'            => ' ',
            'account_deposit_type'                      => 'Account Deposit Type',
            'account_deposit_type_helper'               => ' ',
            'account_credit_payment_type'               => 'Account Credit Payment Type',
            'account_credit_payment_type_helper'        => ' ',
            'account_credit_one_time_commission'        => 'Account Credit One Time Commission',
            'account_credit_one_time_commission_helper' => ' ',
            'account_credit_monthly_commission'         => 'Account Credit Monthly Commission',
            'account_credit_monthly_commission_helper'  => ' ',
            'account_credit_payment_day'                => 'Account Credit Payment Day',
            'account_credit_payment_day_helper'         => ' ',
            'loan_give_date'                            => 'Loan Give Date',
            'loan_give_date_helper'                     => ' ',
            'loan_take_date'                            => 'Loan Take Date',
            'loan_take_date_helper'                     => ' ',
            'loan_debitor_email'                        => 'Loan Debitor Email',
            'loan_debitor_email_helper'                 => ' ',
            'loan_debitor_phone'                        => 'Loan Debitor Phone',
            'loan_debitor_phone_helper'                 => ' ',
            'loan_interest_rate'                        => 'Loan Interest Rate',
            'loan_interest_rate_helper'                 => ' ',
            'immovables_estate_type'                    => 'Immovables Estate Type',
            'immovables_estate_type_helper'             => ' ',
            'immovables_living_space'                   => 'Immovables Living Space',
            'immovables_living_space_helper'            => ' ',
            'immovables_usable_space'                   => 'Immovables Usable Space',
            'immovables_usable_space_helper'            => ' ',
            'immovables_landing_plot'                   => 'Immovables Landing Plot',
            'immovables_landing_plot_helper'            => ' ',
            'immovables_distance_to_city'               => 'Immovables Distance To City',
            'immovables_distance_to_city_helper'        => ' ',
            'immovables_floor'                          => 'Immovables Floor',
            'immovables_floor_helper'                   => ' ',
            'immovables_count_floor'                    => 'Immovables Count Floor',
            'immovables_count_floor_helper'             => ' ',
            'immovables_city'                           => 'Immovables City',
            'immovables_city_helper'                    => ' ',
            'immovables_district'                       => 'Immovables District',
            'immovables_district_helper'                => ' ',
            'immovables_purchase_date'                  => 'Immovables Purchase Date',
            'immovables_purchase_date_helper'           => ' ',
            'auto_transport_type'                       => 'Auto Transport Type',
            'auto_transport_type_helper'                => ' ',
            'auto_brand'                                => 'Auto Brand',
            'auto_brand_helper'                         => ' ',
            'auto_model'                                => 'Auto Model',
            'auto_model_helper'                         => ' ',
            'auto_modification'                         => 'Auto Modification',
            'auto_modification_helper'                  => ' ',
            'auto_fuel_type'                            => 'Auto Fuel Type',
            'auto_fuel_type_helper'                     => ' ',
            'auto_transmission_type'                    => 'Auto Transmission Type',
            'auto_transmission_type_helper'             => ' ',
            'auto_color'                                => 'Auto Color',
            'auto_color_helper'                         => ' ',
            'auto_year'                                 => 'Auto Year',
            'auto_year_helper'                          => ' ',
            'auto_engine_size'                          => 'Auto Engine Size',
            'auto_engine_size_helper'                   => ' ',
            'auto_region'                               => 'Auto Region',
            'auto_region_helper'                        => ' ',
            'auto_mileage'                              => 'Auto Mileage',
            'auto_mileage_helper'                       => ' ',
            'auto_purchase_date'                        => 'Auto Purchase Date',
            'auto_purchase_date_helper'                 => ' ',
        ],
    ],
    'operation'      => [
        'title'          => 'Operations',
        'title_singular' => 'Operation',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'amount'                      => 'Amount',
            'amount_helper'               => ' ',
            'done_at'                     => 'Done At',
            'done_at_helper'              => ' ',
            'source_account'              => 'Source Account',
            'source_account_helper'       => ' ',
            'to_account'                  => 'To Account',
            'to_account_helper'           => ' ',
            'type'                        => 'Type',
            'type_helper'                 => ' ',
            'category'                    => 'Category',
            'category_helper'             => ' ',
            'description'                 => 'Description',
            'description_helper'          => ' ',
            'user'                        => 'User',
            'user_helper'                 => ' ',
            'attachment'                  => 'Attachment',
            'attachment_helper'           => ' ',
            'related_transactions'        => 'Related Transactions',
            'related_transactions_helper' => ' ',
            'cal_repeat'                  => 'Cal Repeat',
            'cal_repeat_helper'           => ' ',
            'google_sync'                 => 'Google Sync',
            'google_sync_helper'          => ' ',
            'remind_operation'            => 'Remind Operation',
            'remind_operation_helper'     => ' ',
            'is_calendar'                 => 'Is Calendar',
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
];
