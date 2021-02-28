<?php


namespace Parents\ValueObjects;


use Akaunting\Money\Money;
use Funeralzone\ValueObjects\ValueObject;

class MoneyValueObject implements \Funeralzone\ValueObjects\ValueObject
{
    public function __construct(
        protected ?Money $money
    )
    {}

    /**
     * @inheritDoc
     */
    public function isNull(): bool
    {
        return is_null($this->money);
    }

    /**
     * @inheritDoc
     */
    public function isSame(ValueObject $object): bool
    {
        return $this->money->equals($object);
    }

    /**
     * @inheritDoc
     */
    public static function fromNative($native)
    {
        $code = \Auth::user()?->currency?->code;
        if (!$code || !$native) {
            $code = config('panel.default_currency_code');
        }
        return new static(\money($native, $code));
    }

    public static function fromFloat(float $native): self
    {
        return self::fromNative((int) ($native * 100));
    }

    /**
     * @inheritDoc
     */
    public function toNative(): ?string
    {
        return $this->money?->format();
    }

    public function toArray(): ?array
    {
        return $this->money?->toArray();
    }

    public function toValue(): ?float
    {
        return $this->money?->getValue();
    }

    /**
     * @return Money
     */
    public function getMoney(): Money
    {
        return $this->money;
    }

    public function toInt(): int
    {
        return (int) ($this->toValue() * 100);
    }
}
