<?php

namespace Database\Seeders;

use Domains\Accounts\Seeders\AccountTypesTableSeeder;
use Domains\AutoBrands\Seeders\AutoBrandsTableSeeder;
use Domains\Banks\Seeders\BanksTableSeeder;
use Domains\CardTypes\Seeders\CardTypesTableSeeder;
use Domains\Categories\Seeders\CategoriesTableSeeder;
use Domains\Countries\Seeders\CountriesTableSeeder;
use Domains\Currencies\Seeders\CurrenciesTableSeeder;
use Domains\Targets\Seeders\TargetCategoriesTableSeeder;
use Domains\Teams\Seeders\TeamsTableSeeder;
use Domains\Users\Seeders\PermissionRoleTableSeeder;
use Domains\Users\Seeders\PermissionsTableSeeder;
use Domains\Users\Seeders\RolesTableSeeder;
use Domains\Users\Seeders\RoleUserTableSeeder;
use Domains\Users\Seeders\UsersTableSeeder;
use Parents\Seeders\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
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
