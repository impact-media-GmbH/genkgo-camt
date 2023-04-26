<?php

namespace Genkgo\Camt\DTO;

class Reference
{
    /**
     * @var string|null
     */
    private $messageId;

    /**
     * @var string|null
     */
    private $accountServicerReference;

    /**
     * @var string|null
     */
    private $paymentInformationId;

    /**
     * @var string|null
     */
    private $instructionId;

    /**
     * @var string|null
     */
    private $endToEndId;

    /**
     * @var string|null
     */
    private $uuidEndToEndReference;

    /**
     * @var string|null
     */
    private $transactionId;

    /**
     * @var string|null
     */
    private $mandateId;

    /**
     * @var string|null
     */
    private $chequeNumber;

    /**
     * @var string|null
     */
    private $clearingSystemReference;

    /**
     * @var string|null
     */
    private $accountOwnerTransactionId;

    /**
     * @var string|null
     */
    private $accountServicerTransactionId;

    /**
     * @var string|null
     */
    private $marketInfrastructureTransactionId;

    /**
     * @var string|null
     */
    private $processingId;

    /**
     * @var ProprietaryReference[]
     */
    private $proprietaries = [];

    /**
     * @return string|null
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param string|null $messageId
     * @return $this
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountServicerReference()
    {
        return $this->accountServicerReference;
    }

    /**
     * @param string|null $accountServicerReference
     * @return $this
     */
    public function setAccountServicerReference($accountServicerReference)
    {
        $this->accountServicerReference = $accountServicerReference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentInformationId()
    {
        return $this->paymentInformationId;
    }

    /**
     * @param string|null $paymentInformationId
     * @return $this
     */
    public function setPaymentInformationId($paymentInformationId)
    {
        $this->paymentInformationId = $paymentInformationId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInstructionId()
    {
        return $this->instructionId;
    }

    /**
     * @param string|null $instructionId
     * @return $this
     */
    public function setInstructionId($instructionId)
    {
        $this->instructionId = $instructionId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndToEndId()
    {
        return $this->endToEndId;
    }

    /**
     * @param string|null $endToEndId
     * @return $this
     */
    public function setEndToEndId($endToEndId)
    {
        $this->endToEndId = $endToEndId;

        return $this;
    }

    /**
     * Universally unique identifier to provide an end-to-end reference of a payment transaction.
     * @return string|null
     */
    public function getUuidEndToEndReference()
    {
        return $this->uuidEndToEndReference;
    }

    /**
     * @param string|null $uuidEndToEndReference
     * @return void
     */
    public function setUuidEndToEndReference($uuidEndToEndReference)
    {
        $this->uuidEndToEndReference = $uuidEndToEndReference;
    }

    /**
     * @return string|null
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string|null $transactionId
     * @return $this
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMandateId()
    {
        return $this->mandateId;
    }

    /**
     * @param string|null $mandateId
     * @return $this
     */
    public function setMandateId($mandateId)
    {
        $this->mandateId = $mandateId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChequeNumber()
    {
        return $this->chequeNumber;
    }

    /**
     * @param string|null $chequeNumber
     * @return $this
     */
    public function setChequeNumber($chequeNumber)
    {
        $this->chequeNumber = $chequeNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getClearingSystemReference()
    {
        return $this->clearingSystemReference;
    }

    /**
     * @param string|null $clearingSystemReference
     * @return $this
     */
    public function setClearingSystemReference($clearingSystemReference)
    {
        $this->clearingSystemReference = $clearingSystemReference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountOwnerTransactionId()
    {
        return $this->accountOwnerTransactionId;
    }

    /**
     * @param string|null $accountOwnerTransactionId
     * @return $this
     */
    public function setAccountOwnerTransactionId($accountOwnerTransactionId)
    {
        $this->accountOwnerTransactionId = $accountOwnerTransactionId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountServicerTransactionId()
    {
        return $this->accountServicerTransactionId;
    }

    /**
     * @param string|null $accountServicerTransactionId
     * @return $this
     */
    public function setAccountServicerTransactionId($accountServicerTransactionId)
    {
        $this->accountServicerTransactionId = $accountServicerTransactionId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMarketInfrastructureTransactionId()
    {
        return $this->marketInfrastructureTransactionId;
    }

    /**
     * @param string|null $marketInfrastructureTransactionId
     * @return $this
     */
    public function setMarketInfrastructureTransactionId($marketInfrastructureTransactionId)
    {
        $this->marketInfrastructureTransactionId = $marketInfrastructureTransactionId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProcessingId()
    {
        return $this->processingId;
    }

    /**
     * @param string|null $processingId
     * @return $this
     */
    public function setProcessingId($processingId)
    {
        $this->processingId = $processingId;

        return $this;
    }

    /**
     * @param \Genkgo\Camt\DTO\ProprietaryReference $proprietary
     * @return $this
     */
    public function addProprietary($proprietary)
    {
        $this->proprietaries[] = $proprietary;

        return $this;
    }

    /**
     * @return ProprietaryReference[]
     */
    public function getProprietaries()
    {
        return $this->proprietaries;
    }
}
