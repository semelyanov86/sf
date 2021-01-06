<?php

namespace Database\Seeders;

use Domains\Countries\Models\Country;
use App\Models\TargetCategory;
use Illuminate\Database\Seeder;

class TargetCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['id' => 1, 'target_category_name' => 'Долг по ипотеке', 'target_category_type' => '2'],
            ['id' => 2, 'target_category_name' => 'Долг по кредитам', 'target_category_type' => '2'],
            ['id' => 3, 'target_category_name' => 'Долг по кредитным картам', 'target_category_type' => '2'],
            ['id' => 4, 'target_category_name' => 'Прочие долги', 'target_category_type' => '2'],
            ['id' => 5, 'target_category_name' => 'Автомобиль', 'target_category_type' => '1'],
            ['id' => 6, 'target_category_name' => 'Бытовая техника', 'target_category_type' => '1'],
            ['id' => 7, 'target_category_name' => 'Дом', 'target_category_type' => '1'],
            ['id' => 8, 'target_category_name' => 'Земельный участок', 'target_category_type' => '1'],
            ['id' => 9, 'target_category_name' => 'Квартира', 'target_category_type' => '1'],
            ['id' => 10, 'target_category_name' => 'Компьютер', 'target_category_type' => '1'],
            ['id' => 11, 'target_category_name' => 'Лечение', 'target_category_type' => '1'],
            ['id' => 12, 'target_category_name' => 'Мебель', 'target_category_type' => '1'],
            ['id' => 13, 'target_category_name' => 'Мотоцикл', 'target_category_type' => '1'],
            ['id' => 14, 'target_category_name' => 'Отпуск', 'target_category_type' => '1'],
            ['id' => 15, 'target_category_name' => 'Прочее', 'target_category_type' => '1'],
            ['id' => 16, 'target_category_name' => 'Ремонт квартиры и дома', 'target_category_type' => '1'],
            ['id' => 17, 'target_category_name' => 'Свадьба', 'target_category_type' => '1'],
            ['id' => 18, 'target_category_name' => 'Финансовая подушка', 'target_category_type' => '1'],
            ['id' => 19, 'target_category_name' => 'Шуба', 'target_category_type' => '1'],
            ['id' => 20, 'target_category_name' => 'Электроника', 'target_category_type' => '1'],
            ['id' => 21, 'target_category_name' => 'Ювелирные украшения', 'target_category_type' => '1'],
        ];

        TargetCategory::insert($categories);
    }
}
