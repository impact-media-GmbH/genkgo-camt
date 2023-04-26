<?php

namespace Genkgo\Camt\DTO;

use Money\Money;

class EntryTransactionDetail
{
    /**
     * @var \Genkgo\Camt\DTO\Reference|null
     */
    private $reference;

    /**
     * @var RelatedParty[]
     */
    private $relatedParties = [];

    /**
     * @var RelatedAgent[]
     */
    private $relatedAgents = [];

    /**
     * @var \Genkgo\Camt\DTO\RemittanceInformation|null
     */
    private $remittanceInformation;

    /**
     * @var \Genkgo\Camt\DTO\RelatedDates|null
     */
    private $relatedDates;

    /**
     * @var \Genkgo\Camt\DTO\ReturnInformation|null
     */
    private $returnInformation;

    /**
     * @var \Genkgo\Camt\DTO\AdditionalTransactionInformation|null
     */
    private $additionalTransactionInformation;

    /**
     * @var \Genkgo\Camt\DTO\BankTransactionCode|null
     */
    private $bankTransactionCode;

    /**
     * @var \Genkgo\Camt\DTO\Charges|null
     */
    private $charges;

    /**
     * @var \Money\Money|null
     */
    private $amountDetails;

    /**
     * @var \Money\Money|null
     */
    private $amount;

    /**
     * @param \Genkgo\Camt\DTO\Reference|null $reference
     * @return void
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return \Genkgo\Camt\DTO\Reference|null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param \Genkgo\Camt\DTO\RelatedParty $relatedParty
     * @return void
     */
    public function addRelatedParty($relatedParty)
    {
        $this->relatedParties[] = $relatedParty;
    }

    /**
     * @return RelatedParty[]
     */
    public function getRelatedParties()
    {
        return $this->relatedParties;
    }

    /**
     * @return \Genkgo\Camt\DTO\RelatedParty|null
     */
    public function getRelatedParty()
    {
        if (isset($this->relatedParties[0])) {
            return $this->relatedParties[0];
        }

        return null;
    }

    /**
     * @param \Genkgo\Camt\DTO\RelatedAgent $relatedAgent
     * @return void
     */
    public function addRelatedAgent($relatedAgent)
    {
        $this->relatedAgents[] = $relatedAgent;
    }

    /**
     * @return RelatedAgent[]
     */
    public function getRelatedAgents()
    {
        return $this->relatedAgents;
    }

    /**
     * @return \Genkgo\Camt\DTO\RelatedAgent|null
     */
    public function getRelatedAgent()
    {
        if (isset($this->relatedAgents[0])) {
            return $this->relatedAgents[0];
        }

        return null;
    }

    /**
     * @param \Genkgo\Camt\DTO\RemittanceInformation|null $remittanceInformation
     * @return void
     */
    public function setRemittanceInformation($remittanceInformation)
    {
        $this->remittanceInformation = $remittanceInformation;
    }

    /**
     * @return \Genkgo\Camt\DTO\RemittanceInformation|null
     */
    public function getRemittanceInformation()
    {
        return $this->remittanceInformation;
    }

    /**
     * @param \Genkgo\Camt\DTO\RelatedDates|null $relatedDates
     * @return void
     */
    public function setRelatedDates($relatedDates)
    {
        $this->relatedDates = $relatedDates;
    }

    /**
     * @return \Genkgo\Camt\DTO\RelatedDates|null
     */
    public function getRelatedDates()
    {
        return $this->relatedDates;
    }

    /**
     * @return \Genkgo\Camt\DTO\ReturnInformation|null
     */
    public function getReturnInformation()
    {
        return $this->returnInformation;
    }

    /**
     * @param \Genkgo\Camt\DTO\ReturnInformation|null $information
     * @return void
     */
    public function setReturnInformation($information)
    {
        $this->returnInformation = $information;
    }

    /**
     * @param \Genkgo\Camt\DTO\AdditionalTransactionInformation|null $additionalTransactionInformation
     * @return void
     */
    public function setAdditionalTransactionInformation($additionalTransactionInformation)
    {
        $this->additionalTransactionInformation = $additionalTransactionInformation;
    }

    /**
     * @return \Genkgo\Camt\DTO\AdditionalTransactionInformation|null
     */
    public function getAdditionalTransactionInformation()
    {
        return $this->additionalTransactionInformation;
    }

    /**
     * @return \Genkgo\Camt\DTO\BankTransactionCode|null
     */
    public function getBankTransactionCode()
    {
        return $this->bankTransactionCode;
    }

    /**
     * @param \Genkgo\Camt\DTO\BankTransactionCode $bankTransactionCode
     * @return void
     */
    public function setBankTransactionCode($bankTransactionCode)
    {
        $this->bankTransactionCode = $bankTransactionCode;
    }

    /**
     * @return \Genkgo\Camt\DTO\Charges|null
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * @param \Genkgo\Camt\DTO\Charges|null $charges
     * @return void
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;
    }

    /**
     * @return \Money\Money|null
     */
    public function getAmountDetails()
    {
        return $this->amountDetails;
    }

    /**
     * @param \Money\Money|null $amountDetails
     * @return void
     */
    public function setAmountDetails($amountDetails)
    {
        $this->amountDetails = $amountDetails;
    }

    /**
     * @return \Money\Money|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param \Money\Money|null $amount
     * @return void
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
