<?php

namespace Domains\Accounts\Seeders;

use Domains\Accounts\Models\AccountType;
use Parents\Seeders\Seeder;

class AccountTypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['id' => 1, 'name' => 'Наличные', 'parent_description' => 'Деньги'],
            ['id' => 2, 'name' => 'Дебетовая карта', 'parent_description' => 'Деньги'],
            ['id' => 3, 'name' => 'Депозит', 'parent_description' => 'Деньги'],
            ['id' => 4, 'name' => 'Электронный кошелёк', 'parent_description' => 'Деньги'],
            ['id' => 5, 'name' => 'Банковский счёт', 'parent_description' => 'Деньги'],
            ['id' => 6, 'name' => 'Мне должны (заём выданный)', 'parent_description' => 'Мне должны'],
            ['id' => 7, 'name' => 'Я должен (заём полученный)', 'parent_description' => 'Я должен'],
            ['id' => 8, 'name' => 'Кредитная карта', 'parent_description' => 'Я должен'],
            ['id' => 9, 'name' => 'Кредит', 'parent_description' => 'Я должен'],
            ['id' => 10, 'name' => 'Брокерский счёт', 'parent_description' => 'Инвестиции'],
            ['id' => 11, 'name' => 'Металлический счёт (ОМС)', 'parent_description' => 'Инвестиции'],
            ['id' => 12, 'name' => 'Акции', 'parent_description' => 'Инвестиции'],
            ['id' => 13, 'name' => 'Облигации', 'parent_description' => 'Инвестиции'],
            ['id' => 14, 'name' => 'Другие ценные бумаги', 'parent_description' => 'Инвестиции'],
            ['id' => 15, 'name' => 'ПИФ', 'parent_description' => 'Инвестиции'],
            ['id' => 16, 'name' => 'ОФБУ', 'parent_description' => 'Инвестиции'],
            ['id' => 17, 'name' => 'Фонд', 'parent_description' => 'Инвестиции'],
            ['id' => 18, 'name' => 'Накопительное страхование жизни', 'parent_description' => 'Инвестиции'],
            ['id' => 19, 'name' => 'Накопительный план', 'parent_description' => 'Инвестиции'],
            ['id' => 20, 'name' => 'Негосударственный пенсионный фонд', 'parent_description' => 'Инвестиции'],
            ['id' => 21, 'name' => 'Пенсионный счёт', 'parent_description' => 'Инвестиции'],
            ['id' => 22, 'name' => 'ПАММ-счёт', 'parent_description' => 'Инвестиции'],
            ['id' => 23, 'name' => 'Недвижимость', 'parent_description' => 'Имущество'],
            ['id' => 24, 'name' => 'Автомобиль', 'parent_description' => 'Имущество'],
            ['id' => 25, 'name' => 'Водный транспорт', 'parent_description' => 'Имущество'],
            ['id' => 26, 'name' => 'Произведение искусства', 'parent_description' => 'Имущество'],
            ['id' => 27, 'name' => 'Бизнес', 'parent_description' => 'Имущество'],
            ['id' => 28, 'name' => 'Прочее имущество', 'parent_description' => 'Имущество'],
            ['id' => 29, 'name' => 'Мототехника', 'parent_description' => 'Имущество'],
            ['id' => 30, 'name' => 'Воздушный транспорт', 'parent_description' => 'Имущество'],
            ['id' => 31, 'name' => 'Бонусная карта', 'parent_description' => 'Карты лояльности'],
        ];

        AccountType::insert($types);
    }
}
