<?php

namespace Domains\Users\Seeders;

use Domains\Users\Models\Permission;
use Parents\Seeders\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'team_create',
            ],
            [
                'id'    => 18,
                'title' => 'team_edit',
            ],
            [
                'id'    => 19,
                'title' => 'team_show',
            ],
            [
                'id'    => 20,
                'title' => 'team_delete',
            ],
            [
                'id'    => 21,
                'title' => 'team_access',
            ],
            [
                'id'    => 22,
                'title' => 'country_create',
            ],
            [
                'id'    => 23,
                'title' => 'country_edit',
            ],
            [
                'id'    => 24,
                'title' => 'country_show',
            ],
            [
                'id'    => 25,
                'title' => 'country_delete',
            ],
            [
                'id'    => 26,
                'title' => 'country_access',
            ],
            [
                'id'    => 27,
                'title' => 'currency_create',
            ],
            [
                'id'    => 28,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 29,
                'title' => 'currency_show',
            ],
            [
                'id'    => 30,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 31,
                'title' => 'currency_access',
            ],
            [
                'id'    => 32,
                'title' => 'bank_create',
            ],
            [
                'id'    => 33,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 34,
                'title' => 'bank_show',
            ],
            [
                'id'    => 35,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 36,
                'title' => 'bank_access',
            ],
            [
                'id'    => 37,
                'title' => 'category_create',
            ],
            [
                'id'    => 38,
                'title' => 'category_edit',
            ],
            [
                'id'    => 39,
                'title' => 'category_show',
            ],
            [
                'id'    => 40,
                'title' => 'category_delete',
            ],
            [
                'id'    => 41,
                'title' => 'category_access',
            ],
            [
                'id'    => 42,
                'title' => 'target_category_create',
            ],
            [
                'id'    => 43,
                'title' => 'target_category_edit',
            ],
            [
                'id'    => 44,
                'title' => 'target_category_show',
            ],
            [
                'id'    => 45,
                'title' => 'target_category_delete',
            ],
            [
                'id'    => 46,
                'title' => 'target_category_access',
            ],
            [
                'id'    => 47,
                'title' => 'budget_create',
            ],
            [
                'id'    => 48,
                'title' => 'budget_edit',
            ],
            [
                'id'    => 49,
                'title' => 'budget_show',
            ],
            [
                'id'    => 50,
                'title' => 'budget_delete',
            ],
            [
                'id'    => 51,
                'title' => 'budget_access',
            ],
            [
                'id'    => 52,
                'title' => 'target_create',
            ],
            [
                'id'    => 53,
                'title' => 'target_edit',
            ],
            [
                'id'    => 54,
                'title' => 'target_show',
            ],
            [
                'id'    => 55,
                'title' => 'target_delete',
            ],
            [
                'id'    => 56,
                'title' => 'target_access',
            ],
            [
                'id'    => 57,
                'title' => 'account_create',
            ],
            [
                'id'    => 58,
                'title' => 'account_edit',
            ],
            [
                'id'    => 59,
                'title' => 'account_show',
            ],
            [
                'id'    => 60,
                'title' => 'account_delete',
            ],
            [
                'id'    => 61,
                'title' => 'account_access',
            ],
            [
                'id'    => 62,
                'title' => 'account_type_create',
            ],
            [
                'id'    => 63,
                'title' => 'account_type_edit',
            ],
            [
                'id'    => 64,
                'title' => 'account_type_show',
            ],
            [
                'id'    => 65,
                'title' => 'account_type_delete',
            ],
            [
                'id'    => 66,
                'title' => 'account_type_access',
            ],
            [
                'id'    => 67,
                'title' => 'card_type_create',
            ],
            [
                'id'    => 68,
                'title' => 'card_type_edit',
            ],
            [
                'id'    => 69,
                'title' => 'card_type_show',
            ],
            [
                'id'    => 70,
                'title' => 'card_type_delete',
            ],
            [
                'id'    => 71,
                'title' => 'card_type_access',
            ],
            [
                'id'    => 72,
                'title' => 'additional_data_access',
            ],
            [
                'id'    => 73,
                'title' => 'auto_brand_create',
            ],
            [
                'id'    => 74,
                'title' => 'auto_brand_edit',
            ],
            [
                'id'    => 75,
                'title' => 'auto_brand_show',
            ],
            [
                'id'    => 76,
                'title' => 'auto_brand_delete',
            ],
            [
                'id'    => 77,
                'title' => 'auto_brand_access',
            ],
            [
                'id'    => 78,
                'title' => 'accounts_extra_create',
            ],
            [
                'id'    => 79,
                'title' => 'accounts_extra_edit',
            ],
            [
                'id'    => 80,
                'title' => 'accounts_extra_show',
            ],
            [
                'id'    => 81,
                'title' => 'accounts_extra_delete',
            ],
            [
                'id'    => 82,
                'title' => 'accounts_extra_access',
            ],
            [
                'id'    => 83,
                'title' => 'operation_create',
            ],
            [
                'id'    => 84,
                'title' => 'operation_edit',
            ],
            [
                'id'    => 85,
                'title' => 'operation_show',
            ],
            [
                'id'    => 86,
                'title' => 'operation_delete',
            ],
            [
                'id'    => 87,
                'title' => 'operation_access',
            ],
            [
                'id'    => 88,
                'title' => 'hidden_category_create',
            ],
            [
                'id'    => 89,
                'title' => 'hidden_category_edit',
            ],
            [
                'id'    => 90,
                'title' => 'hidden_category_show',
            ],
            [
                'id'    => 91,
                'title' => 'hidden_category_delete',
            ],
            [
                'id'    => 92,
                'title' => 'hidden_category_access',
            ],
            [
                'id'    => 93,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
