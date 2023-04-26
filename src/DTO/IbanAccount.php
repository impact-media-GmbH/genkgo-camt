<?php

namespace Genkgo\Camt\DTO;

use Genkgo\Camt\Iban;

class IbanAccount extends Account
{
    /**
     * @var \Genkgo\Camt\Iban
     */
    private $iban;

    public function __construct(Iban $iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return \Genkgo\Camt\Iban
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @inheritDoc
     * @return string
     */
    public function getIdentification()
    {
        return (string) $this->iban;
    }
}
