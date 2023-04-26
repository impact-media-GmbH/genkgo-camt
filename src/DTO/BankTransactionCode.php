<?php

namespace Genkgo\Camt\DTO;

class BankTransactionCode
{
    /**
     * @var \Genkgo\Camt\DTO\ProprietaryBankTransactionCode|null
     */
    private $proprietary;

    /**
     * @var \Genkgo\Camt\DTO\DomainBankTransactionCode|null
     */
    private $domain;

    /**
     * @return \Genkgo\Camt\DTO\ProprietaryBankTransactionCode|null
     */
    public function getProprietary()
    {
        return $this->proprietary;
    }

    /**
     * @param \Genkgo\Camt\DTO\ProprietaryBankTransactionCode $proprietary
     * @return void
     */
    public function setProprietary($proprietary)
    {
        $this->proprietary = $proprietary;
    }

    /**
     * @return \Genkgo\Camt\DTO\DomainBankTransactionCode|null
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param \Genkgo\Camt\DTO\DomainBankTransactionCode $domain
     * @return void
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }
}
