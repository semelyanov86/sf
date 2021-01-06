<?php

namespace Database\Seeders;

use Domains\Countries\Seeders\CountriesTableSeeder;
use Domains\Currencies\Seeders\CurrenciesTableSeeder;
use Domains\Teams\Seeders\TeamsTableSeeder;
use Domains\Users\Seeders\PermissionRoleTableSeeder;
use Domains\Users\Seeders\PermissionsTableSeeder;
use Domains\Users\Seeders\RolesTableSeeder;
use Domains\Users\Seeders\RoleUserTableSeeder;
use Domains\Users\Seeders\UsersTableSeeder;
use Parents\Seeders\Seeder;

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
