<?php

namespace Genkgo\Camt\DTO;

class BBANAccount extends Account
{
    /**
     * @var string
     */
    private $bban;

    /**
     * @param string $bban
     */
    public function __construct($bban)
    {
        $bban = (string) $bban;
        $this->bban = $bban;
    }

    /**
     * @return string
     */
    public function getBban()
    {
        return (string) $this->bban;
    }

    /**
     * @inheritDoc
     * @return string
     */
    public function getIdentification()
    {
        return (string) $this->bban;
    }
}
