<?php

namespace Genkgo\Camt\DTO;

use Money\Money;

class ChargesRecord
{
    /**
     * @var \Money\Money
     */
    private $amount;

    /**
     * @var bool
     */
    private $chargesIncludedIndicator = false;

    /**
     * @var string
     */
    private $identification;

    /**
     * @return \Money\Money
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param \Money\Money $money
     * @return void
     */
    public function setAmount($money)
    {
        $this->amount = $money;
    }

    /**
     * @return bool
     */
    public function getChargesIncludedIndicator()
    {
        return $this->chargesIncludedIndicator;
    }

    /**
     * @param bool $chargesIncludedIndicator
     * @return void
     */
    public function setChargesIncludedIndicator($chargesIncludedIndicator)
    {
        $this->chargesIncludedIndicator = $chargesIncludedIndicator;
    }

    /**
     * @return string
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param string $identification
     * @return void
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
    }
}
