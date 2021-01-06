<?php

namespace Tests\Unit;

use Domains\Users\Models\User;
use PHPUnit\Framework\TestCase;

class CurrencyAttributeTest extends TestCase
{
    /** @test */
    public function it_converts_integer_value_to_money_format()
    {
        $amount = 8956;
        $this->assertEquals('89,56 ₽', money($amount, 'RUB'));
    }
}
