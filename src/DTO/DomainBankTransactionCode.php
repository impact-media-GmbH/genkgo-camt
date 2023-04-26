<?php

namespace Genkgo\Camt\DTO;

class DomainBankTransactionCode
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var \Genkgo\Camt\DTO\DomainFamilyBankTransactionCode
     */
    private $family;

    /**
     * @param string $code
     */
    public function __construct($code)
    {
        $code = (string) $code;
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return void
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return \Genkgo\Camt\DTO\DomainFamilyBankTransactionCode
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param \Genkgo\Camt\DTO\DomainFamilyBankTransactionCode $family
     * @return void
     */
    public function setFamily($family)
    {
        $this->family = $family;
    }
}
