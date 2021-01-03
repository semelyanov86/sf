<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            CountriesTableSeeder::class,
            CurrenciesTableSeeder::class,
            BanksTableSeeder::class,
            CategoriesTableSeeder::class,
            TargetCategoriesTableSeeder::class,
            AccountTypesTableSeeder::class,
            CardTypesTableSeeder::class,
            AutoBrandsTableSeeder::class,
            TeamsTableSeeder::class
        ]);
    }
}
