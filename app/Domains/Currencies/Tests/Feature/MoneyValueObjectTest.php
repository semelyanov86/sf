<?php


namespace Domains\Currencies\Tests\Feature;


use Parents\ValueObjects\MoneyValueObject;

class MoneyValueObjectTest extends \Parents\Tests\PhpUnit\TestCase
{

    /** @test */
    public function it_creates_money_object(): void
    {
        $moneyObject = MoneyValueObject::fromNative(6535);
        $this->assertEquals($moneyObject->toNative(), '65,35 ₽');
    }

    /** @test */
    public function it_returns_array_from_money_object(): void
    {
        $moneyObject = MoneyValueObject::fromFloat(65.35);
        $this->assertArrayHasKey('currency', $moneyObject->toArray());
    }
}
