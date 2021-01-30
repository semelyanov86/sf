<?php

namespace Domains\Currencies\Tests\Unit;

use Parents\Tests\PhpUnit\UnitTestCase as TestCase;

class CurrencyAttributeTest extends TestCase
{
    /** @test */
    public function it_converts_integer_value_to_money_format(): void
    {
        $amount = 8956;
        $this->assertEquals('89,56 ₽', money($amount, 'RUB'));
    }
}
