<?php

namespace Genkgo\Camt\DTO;

use Money\Money;

class Charges
{
    /**
     * @var \Money\Money|null
     */
    private $totalChargesAndTaxAmount;

    /**
     * @var ChargesRecord[]
     */
    private $records = [];

    /**
     * @return \Money\Money|null
     */
    public function getTotalChargesAndTaxAmount()
    {
        return $this->totalChargesAndTaxAmount;
    }

    /**
     * @param \Money\Money $money
     * @return void
     */
    public function setTotalChargesAndTaxAmount($money)
    {
        $this->totalChargesAndTaxAmount = $money;
    }

    /**
     * @param \Genkgo\Camt\DTO\ChargesRecord $record
     * @return void
     */
    public function addRecord($record)
    {
        $this->records[] = $record;
    }

    /**
     * @return ChargesRecord[]
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * @return \Genkgo\Camt\DTO\ChargesRecord|null
     */
    public function getRecord()
    {
        if (isset($this->records[0])) {
            return $this->records[0];
        }

        return null;
    }
}
