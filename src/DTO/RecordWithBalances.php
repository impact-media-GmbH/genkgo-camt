<?php

namespace Genkgo\Camt\DTO;

abstract class RecordWithBalances extends Record
{
    /**
     * @var Balance[]
     */
    private $balances = [];

    /**
     * @param \Genkgo\Camt\DTO\Balance $balance
     * @return void
     */
    public function addBalance($balance)
    {
        $this->balances[] = $balance;
    }

    /**
     * @return Balance[]
     */
    public function getBalances()
    {
        return $this->balances;
    }
}
