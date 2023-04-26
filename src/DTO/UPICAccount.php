<?php

namespace Genkgo\Camt\DTO;

class UPICAccount extends Account
{
    /**
     * @var string
     */
    private $upic;

    /**
     * @param string $upic
     */
    public function __construct($upic)
    {
        $upic = (string) $upic;
        $this->upic = $upic;
    }

    /**
     * @return string
     */
    public function getUpic()
    {
        return (string) $this->upic;
    }

    /**
     * @inheritDoc
     * @return string
     */
    public function getIdentification()
    {
        return (string) $this->upic;
    }
}
