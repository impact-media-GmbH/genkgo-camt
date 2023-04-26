<?php

namespace Genkgo\Camt\DTO;

class StructuredRemittanceInformation
{
    /**
     * @var \Genkgo\Camt\DTO\CreditorReferenceInformation|null
     */
    private $creditorReferenceInformation;

    /**
     * @var string|null
     */
    private $additionalRemittanceInformation;

    /**
     * @return string|null
     */
    public function getAdditionalRemittanceInformation()
    {
        return $this->additionalRemittanceInformation;
    }

    /**
     * @param string|null $additionalRemittanceInformation
     * @return void
     */
    public function setAdditionalRemittanceInformation($additionalRemittanceInformation)
    {
        $this->additionalRemittanceInformation = $additionalRemittanceInformation;
    }

    /**
     * @return \Genkgo\Camt\DTO\CreditorReferenceInformation|null
     */
    public function getCreditorReferenceInformation()
    {
        return $this->creditorReferenceInformation;
    }

    /**
     * @param \Genkgo\Camt\DTO\CreditorReferenceInformation|null $creditorReferenceInformation
     * @return void
     */
    public function setCreditorReferenceInformation($creditorReferenceInformation)
    {
        $this->creditorReferenceInformation = $creditorReferenceInformation;
    }
}
