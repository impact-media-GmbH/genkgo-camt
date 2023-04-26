<?php

namespace Genkgo\Camt\DTO;

class AdditionalTransactionInformation
{
    /**
     * @var string
     */
    private $information;

    /**
     * @param string $information
     */
    public function __construct($information)
    {
        $information = (string) $information;
        $this->information = $information;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->information;
    }
}
