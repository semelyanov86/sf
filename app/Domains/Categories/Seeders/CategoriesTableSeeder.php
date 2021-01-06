<?php

namespace Domains\Categories\Seeders;

use Domains\Categories\Models\Category;
use Domains\Countries\Models\Country;
use Parents\Seeders\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Автомобиль', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 30, 'name' => 'Автомобиль', 'type' => '-1', 'parent' => null, 'sys_category' => 1],
            ['id' => 31, 'name' => 'Аренда автомобиля', 'type' => '-1', 'parent' => 30, 'sys_category' => 1],
            ['id' => 32, 'name' => 'Мойка автомобиля', 'type' => '-1', 'parent' => 30, 'sys_category' => 1],
            ['id' => 33, 'name' => 'Платные дороги, штрафы', 'type' => '-1', 'parent' => 30, 'sys_category' => 1],
            ['id' => 34, 'name' => 'Стоянка', 'type' => '-1', 'parent' => 30, 'sys_category' => 1],
            ['id' => 35, 'name' => 'ТО, ремонт автомобиля', 'type' => '-1', 'parent' => 30, 'sys_category' => 1],
            ['id' => 36, 'name' => 'Топливо', 'type' => '-1', 'parent' => 30, 'sys_category' => 1],
            ['id' => 37, 'name' => 'Транспортный налог', 'type' => '-1', 'parent' => 30, 'sys_category' => 1],
            ['id' => 2, 'name' => 'Банковское обслуживание', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 38, 'name' => 'Банковское обслуживание', 'type' => '-1', 'parent' => null, 'sys_category' => 2],
            ['id' => 39, 'name' => 'Комиссия банкомата', 'type' => '-1', 'parent' => 38, 'sys_category' => 2],
            ['id' => 40, 'name' => 'Услуги банка', 'type' => '-1', 'parent' => 38, 'sys_category' => 2],
            ['id' => 3, 'name' => 'Вредные привычки', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 41, 'name' => 'Вредные привычки', 'type' => '-1', 'parent' => null, 'sys_category' => 3],
            ['id' => 42, 'name' => 'Алкоголь и табачные изделия', 'type' => '-1', 'parent' => 41, 'sys_category' => 3],
            ['id' => 4, 'name' => 'Дети', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 43, 'name' => 'Дети', 'type' => '-1', 'parent' => null, 'sys_category' => 4],
            ['id' => 45, 'name' => 'Детская одежда и обувь', 'type' => '-1', 'parent' => 43, 'sys_category' => 4],
            ['id' => 46, 'name' => 'Детские врачи', 'type' => '-1', 'parent' => 43, 'sys_category' => 4],
            ['id' => 47, 'name' => 'Детское питание и гигиена', 'type' => '-1', 'parent' => 43, 'sys_category' => 4],
            ['id' => 48, 'name' => 'Игрушки', 'type' => '-1', 'parent' => 43, 'sys_category' => 4],
            ['id' => 49, 'name' => 'Образование детей', 'type' => '-1', 'parent' => 43, 'sys_category' => 4],
            ['id' => 50, 'name' => 'Оплата няни', 'type' => '-1', 'parent' => 43, 'sys_category' => 4],
            ['id' => 51, 'name' => 'Хобби, спорт, увлечения детей', 'type' => '-1', 'parent' => 43, 'sys_category' => 4],
            ['id' => 5, 'name' => 'Домашнее хозяйство', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 52, 'name' => 'Домашнее хозяйство', 'type' => '-1', 'parent' => null, 'sys_category' => 5],
            ['id' => 53, 'name' => 'Аренда жилья', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 54, 'name' => 'Покупка мебели и предметов интерьера', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 55, 'name' => 'Прачечная и химчистка', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 56, 'name' => 'Прочие бытовые услуги', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 57, 'name' => 'Ремонт недвижимости', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 58, 'name' => 'Ремонт обуви', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 59, 'name' => 'Уборка дома', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 60, 'name' => 'Хозяйственные товары', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 61, 'name' => 'Электроника и техника', 'type' => '-1', 'parent' => 52, 'sys_category' => 5],
            ['id' => 6, 'name' => 'Животные', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 62, 'name' => 'Домашние Животные', 'type' => '-1', 'parent' => null, 'sys_category' => 6],
            ['id' => 63, 'name' => 'Ветеринар', 'type' => '-1', 'parent' => 62, 'sys_category' => 6],
            ['id' => 64, 'name' => 'Корм', 'type' => '-1', 'parent' => 62, 'sys_category' => 6],
            ['id' => 65, 'name' => 'Прочие расходы на животных', 'type' => '-1', 'parent' => 62, 'sys_category' => 6],
            ['id' => 7, 'name' => 'Досуг и отдых', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 66, 'name' => 'Досуг и отдых', 'type' => '-1', 'parent' => null, 'sys_category' => 7],
            ['id' => 67, 'name' => 'Кино, видео, музыка, фото, игры', 'type' => '-1', 'parent' => 66, 'sys_category' => 7],
            ['id' => 68, 'name' => 'Книги, газеты и журналы', 'type' => '-1', 'parent' => 66, 'sys_category' => 7],
            ['id' => 69, 'name' => 'Культурные события, театры, выставки', 'type' => '-1', 'parent' => 66, 'sys_category' => 7],
            ['id' => 70, 'name' => 'Отпуск', 'type' => '-1', 'parent' => 66, 'sys_category' => 7],
            ['id' => 71, 'name' => 'Развлечения', 'type' => '-1', 'parent' => 66, 'sys_category' => 7],
            ['id' => 72, 'name' => 'Рестораны, кафе и отдых', 'type' => '-1', 'parent' => 66, 'sys_category' => 7],
            ['id' => 73, 'name' => 'Спортивные события и товары', 'type' => '-1', 'parent' => 66, 'sys_category' => 7],
            ['id' => 8, 'name' => 'Инвестиции', 'type' => '1', 'parent' => null, 'sys_category' => null],
            ['id' => 74, 'name' => 'Инвестиционный доход', 'type' => '1', 'parent' => null, 'sys_category' => 8],
            ['id' => 75, 'name' => 'Дивиденды', 'type' => '1', 'parent' => 74, 'sys_category' => 8],
            ['id' => 76, 'name' => 'Доход от аренды имущества', 'type' => '1', 'parent' => 74, 'sys_category' => 8],
            ['id' => 77, 'name' => 'Доход от прироста капитала', 'type' => '1', 'parent' => 74, 'sys_category' => 8],
            ['id' => 78, 'name' => 'Проценты полученные', 'type' => '1', 'parent' => 74, 'sys_category' => 8],
            ['id' => 9, 'name' => 'Инвестиции (расходы)', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 79, 'name' => 'Инвестиционный расход', 'type' => '-1', 'parent' => null, 'sys_category' => 9],
            ['id' => 80, 'name' => 'Потери от инвестиций', 'type' => '-1', 'parent' => 79, 'sys_category' => 9],
            ['id' => 81, 'name' => 'Ипотека', 'type' => '-1', 'parent' => null, 'sys_category' => 5],

            ['id' => 10, 'name' => 'Коммунальные платежи', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 82, 'name' => 'Коммунальные платежи', 'type' => '-1', 'parent' => null, 'sys_category' => 10],
            ['id' => 83, 'name' => 'Водоснабжение', 'type' => '-1', 'parent' => 82, 'sys_category' => 10],
            ['id' => 84, 'name' => 'Квартплата', 'type' => '-1', 'parent' => 82, 'sys_category' => 10],
            ['id' => 85, 'name' => 'Консьержи и охрана', 'type' => '-1', 'parent' => 82, 'sys_category' => 10],
            ['id' => 86, 'name' => 'Электричество', 'type' => '-1', 'parent' => 82, 'sys_category' => 10],

            ['id' => 11, 'name' => 'Импорт (расход)', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 87, 'name' => 'Коррекция баланса', 'type' => '-1', 'parent' => null, 'sys_category' => 11],

            ['id' => 12, 'name' => 'Медицина', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 88, 'name' => 'Медицина', 'type' => '-1', 'parent' => null, 'sys_category' => 11],
            ['id' => 89, 'name' => 'Лекарства', 'type' => '-1', 'parent' => 88, 'sys_category' => 11],
            ['id' => 90, 'name' => 'Стационар', 'type' => '-1', 'parent' => 88, 'sys_category' => 11],
            ['id' => 91, 'name' => 'Стоматология', 'type' => '-1', 'parent' => 88, 'sys_category' => 11],
            ['id' => 92, 'name' => 'Терапевт и другие врачи', 'type' => '-1', 'parent' => 88, 'sys_category' => 11],

            ['id' => 13, 'name' => 'Мотоцикл', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 93, 'name' => 'Мотоцикл', 'type' => '-1', 'parent' => null, 'sys_category' => 13],
            ['id' => 94, 'name' => 'Мойка мотоцикла', 'type' => '-1', 'parent' => 93, 'sys_category' => 13],
            ['id' => 95, 'name' => 'Платные дороги, штрафы мото', 'type' => '-1', 'parent' => 93, 'sys_category' => 13],
            ['id' => 96, 'name' => 'Стоянка мотоцикла', 'type' => '-1', 'parent' => 93, 'sys_category' => 13],
            ['id' => 97, 'name' => 'ТО, ремонт мотоцикла', 'type' => '-1', 'parent' => 93, 'sys_category' => 13],
            ['id' => 98, 'name' => 'Топливо для авто', 'type' => '-1', 'parent' => 93, 'sys_category' => 13],

            ['id' => 14, 'name' => 'Налоги и юристы', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 99, 'name' => 'Налоги, сборы и услуги', 'type' => '-1', 'parent' => null, 'sys_category' => 14],
            ['id' => 100, 'name' => 'Другие налоги и сборы', 'type' => '-1', 'parent' => 99, 'sys_category' => 14],
            ['id' => 101, 'name' => 'Консультационные услуги', 'type' => '-1', 'parent' => 99, 'sys_category' => 14],
            ['id' => 102, 'name' => 'Налог на имущество', 'type' => '-1', 'parent' => 99, 'sys_category' => 14],
            ['id' => 103, 'name' => 'Почтовые расходы и оформление документов', 'type' => '-1', 'parent' => 99, 'sys_category' => 14],
            ['id' => 104, 'name' => 'Членские взносы', 'type' => '-1', 'parent' => 99, 'sys_category' => 14],

            ['id' => 15, 'name' => 'Не определена (доход)', 'type' => '1', 'parent' => null, 'sys_category' => null],
            ['id' => 105, 'name' => 'Не определена. Для доходов', 'type' => '1', 'parent' => null, 'sys_category' => 15],

            ['id' => 16, 'name' => 'Не определена (расход)', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 106, 'name' => 'Не определена. Для расходов', 'type' => '-1', 'parent' => null, 'sys_category' => 16],

            ['id' => 17, 'name' => 'Образование и книги', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 107, 'name' => 'Образование', 'type' => '-1', 'parent' => null, 'sys_category' => 17],
            ['id' => 108, 'name' => 'Книги и учебники', 'type' => '-1', 'parent' => 107, 'sys_category' => 17],
            ['id' => 109, 'name' => 'Обучение', 'type' => '-1', 'parent' => 107, 'sys_category' => 17],
            ['id' => 110, 'name' => 'Прочие образовательные расходы', 'type' => '-1', 'parent' => 107, 'sys_category' => 17],

            ['id' => 18, 'name' => 'Одежда, обувь, аксессуары', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 111, 'name' => 'Одежда, обувь, аксессуары', 'type' => '-1', 'parent' => null, 'sys_category' => 18],
            ['id' => 112, 'name' => 'Аксессуары', 'type' => '-1', 'parent' => 111, 'sys_category' => 18],
            ['id' => 113, 'name' => 'Обувь', 'type' => '-1', 'parent' => 111, 'sys_category' => 18],
            ['id' => 114, 'name' => 'Одежда', 'type' => '-1', 'parent' => 111, 'sys_category' => 18],

            ['id' => 19, 'name' => 'Зарплата', 'type' => '1', 'parent' => null, 'sys_category' => null],
            ['id' => 115, 'name' => 'Персональные доходы', 'type' => '1', 'parent' => null, 'sys_category' => 19],
            ['id' => 116, 'name' => 'Бонусы и премии', 'type' => '1', 'parent' => 115, 'sys_category' => 19],
            ['id' => 117, 'name' => 'Доход предпринимателя', 'type' => '1', 'parent' => 115, 'sys_category' => 19],
            ['id' => 118, 'name' => 'Заработная плата', 'type' => '1', 'parent' => 115, 'sys_category' => 19],
            ['id' => 119, 'name' => 'Пенсия', 'type' => '1', 'parent' => 115, 'sys_category' => 19],
            ['id' => 120, 'name' => 'Сверхурочное время', 'type' => '1', 'parent' => 115, 'sys_category' => 19],

            ['id' => 20, 'name' => 'Питание', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 121, 'name' => 'Питание', 'type' => '-1', 'parent' => null, 'sys_category' => 20],
            ['id' => 122, 'name' => 'Питание вне дома', 'type' => '-1', 'parent' => 121, 'sys_category' => 20],
            ['id' => 123, 'name' => 'Питание дома', 'type' => '-1', 'parent' => 121, 'sys_category' => 20],

            ['id' => 21, 'name' => 'Подарки, материальная помощь', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 144, 'name' => 'Подарки, материальная помощь', 'type' => '-1', 'parent' => null, 'sys_category' => 21],

            ['id' => 22, 'name' => 'Общественный транспорт', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 124, 'name' => 'Проезд, транспорт', 'type' => '-1', 'parent' => null, 'sys_category' => 22],
            ['id' => 125, 'name' => 'Авиа и ж/д билеты', 'type' => '-1', 'parent' => 124, 'sys_category' => 22],
            ['id' => 126, 'name' => 'Общественный транспорт', 'type' => '-1', 'parent' => 124, 'sys_category' => 22],
            ['id' => 127, 'name' => 'Такси', 'type' => '-1', 'parent' => 124, 'sys_category' => 22],

            ['id' => 23, 'name' => 'Проценты по кредитам и займам', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 128, 'name' => 'Проценты по кредитам и займам', 'type' => '-1', 'parent' => null, 'sys_category' => 23],

            ['id' => 24, 'name' => 'Прочие доходы', 'type' => '1', 'parent' => null, 'sys_category' => null],
            ['id' => 129, 'name' => 'Прочие доходы', 'type' => '1', 'parent' => null, 'sys_category' => 24],

            ['id' => 25, 'name' => 'Прочие личные расходы', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 130, 'name' => 'Прочие личные расходы', 'type' => '-1', 'parent' => null, 'sys_category' => 25],

            ['id' => 26, 'name' => 'Расходы по работе', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 131, 'name' => 'Расходы по работе', 'type' => '-1', 'parent' => null, 'sys_category' => 26],

            ['id' => 27, 'name' => 'Связь, ТВ и интернет', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 132, 'name' => 'Связь, ТВ и интернет', 'type' => '-1', 'parent' => null, 'sys_category' => 27],
            ['id' => 133, 'name' => 'Городской телефон', 'type' => '-1', 'parent' => 132, 'sys_category' => 27],
            ['id' => 134, 'name' => 'Интернет и ТВ', 'type' => '-1', 'parent' => 132, 'sys_category' => 27],
            ['id' => 135, 'name' => 'Лицензии на ПО', 'type' => '-1', 'parent' => 132, 'sys_category' => 27],
            ['id' => 136, 'name' => 'Оплата сервера и хостинга', 'type' => '-1', 'parent' => 132, 'sys_category' => 27],
            ['id' => 137, 'name' => 'Сотовый телефон', 'type' => '-1', 'parent' => 132, 'sys_category' => 27],

            ['id' => 28, 'name' => 'Страхование', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 138, 'name' => 'Страхование', 'type' => '-1', 'parent' => null, 'sys_category' => 28],

            ['id' => 29, 'name' => 'Уход за собой', 'type' => '-1', 'parent' => null, 'sys_category' => null],
            ['id' => 139, 'name' => 'Уход за собой', 'type' => '-1', 'parent' => null, 'sys_category' => 29],
            ['id' => 140, 'name' => 'Косметика', 'type' => '-1', 'parent' => 139, 'sys_category' => 29],
            ['id' => 141, 'name' => 'Салоны красоты и парикмахерские', 'type' => '-1', 'parent' => 139, 'sys_category' => 29],
            ['id' => 142, 'name' => 'Фитнес и йога', 'type' => '-1', 'parent' => 139, 'sys_category' => 29],
            ['id' => 143, 'name' => 'SPA, массаж и солярий', 'type' => '-1', 'parent' => 139, 'sys_category' => 29],
        ];

        Category::insert($categories);
    }
}
