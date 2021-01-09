<?php

namespace Domains\CardTypes\Seeders;

use Domains\CardTypes\Models\CardType;
use Parents\Seeders\Seeder;

class CardTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        $cards = [
            ['id' => 1, 'name' => 'Visa'],
            ['id' => 2, 'name' => 'MasterCard'],
            ['id' => 3, 'name' => 'American Express'],
            ['id' => 4, 'name' => 'ПРО100'],
            ['id' => 5, 'name' => 'China Unionpay'],
            ['id' => 6, 'name' => 'JCB'],
            ['id' => 7, 'name' => 'Diners Club'],
            ['id' => 8, 'name' => 'УЭК'],
            ['id' => 9, 'name' => 'Золотая корона'],
            ['id' => 10, 'name' => 'Сберкарт'],
            ['id' => 11, 'name' => 'ChronoPay'],
            ['id' => 12, 'name' => 'Белкарт'],
            ['id' => 13, 'name' => 'KAZNNSS'],
            ['id' => 14, 'name' => 'Армениан Кард'],
            ['id' => 15, 'name' => 'НСМЭП'],
            ['id' => 16, 'name' => 'Алтын Асыр'],
            ['id' => 17, 'name' => 'МИР'],
        ];

        CardType::insert($cards);
    }
}
