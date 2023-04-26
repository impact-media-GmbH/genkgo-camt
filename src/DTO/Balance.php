<?php

namespace Genkgo\Camt\DTO;

use DateTimeImmutable;
use Money\Money;

class Balance
{
    const TYPE_OPENING = 'opening';

    const TYPE_OPENING_AVAILABLE = 'opening_available';

    const TYPE_CLOSING = 'closing';

    const TYPE_CLOSING_AVAILABLE = 'closing_available';

    /**
     * @var \Money\Money
     */
    private $amount;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @param string $type
     */
    private function __construct($type, Money $amount, DateTimeImmutable $date)
    {
        $type = (string) $type;
        $this->type = $type;
        $this->amount = $amount;
        $this->date = $date;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return \Money\Money
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param \Money\Money $amount
     * @param \DateTimeImmutable $date
     * @return $this
     */
    public static function opening($amount, $date)
    {
        return new self(self::TYPE_OPENING, $amount, $date);
    }

    /**
     * @param \Money\Money $amount
     * @param \DateTimeImmutable $date
     * @return $this
     */
    public static function openingAvailable($amount, $date)
    {
        return new self(self::TYPE_OPENING_AVAILABLE, $amount, $date);
    }

    /**
     * @param \Money\Money $amount
     * @param \DateTimeImmutable $date
     * @return $this
     */
    public static function closing($amount, $date)
    {
        return new self(self::TYPE_CLOSING, $amount, $date);
    }

    /**
     * @param \Money\Money $amount
     * @param \DateTimeImmutable $date
     * @return $this
     */
    public static function closingAvailable($amount, $date)
    {
        return new self(self::TYPE_CLOSING_AVAILABLE, $amount, $date);
    }
}
