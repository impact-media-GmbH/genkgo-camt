<?php

namespace Genkgo\Camt\DTO;

use DateTimeImmutable;
use Money\Money;

class Entry
{
    /**
     * @var \Genkgo\Camt\DTO\Record
     */
    private $record;

    /**
     * @var \Money\Money
     */
    private $amount;

    /**
     * @var \DateTimeImmutable|null
     */
    private $bookingDate;

    /**
     * @var \DateTimeImmutable|null
     */
    private $valueDate;

    /**
     * @var EntryTransactionDetail[]
     */
    private $transactionDetails = [];

    /**
     * @var bool
     */
    private $reversalIndicator = false;

    /**
     * @var string|null
     */
    private $reference;

    /**
     * @var string|null
     */
    private $accountServicerReference;

    /**
     * @var int
     */
    private $index;

    /**
     * @var string|null
     */
    private $batchPaymentId;

    /**
     * @var string|null
     */
    private $additionalInfo;

    /**
     * @var \Genkgo\Camt\DTO\BankTransactionCode|null
     */
    private $bankTransactionCode;

    /**
     * @var \Genkgo\Camt\DTO\Charges|null
     */
    private $charges;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $creditDebitIndicator;

    /**
     * @param int $index
     */
    public function __construct(Record $record, $index, Money $amount)
    {
        $index = (int) $index;
        $this->record = $record;
        $this->index = $index;
        $this->amount = $amount;
    }

    /**
     * @return \Genkgo\Camt\DTO\Record
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * @return \Money\Money
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getValueDate()
    {
        return $this->valueDate;
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @return void
     */
    public function addTransactionDetail($detail)
    {
        $this->transactionDetails[] = $detail;
    }

    /**
     * @return EntryTransactionDetail[]
     */
    public function getTransactionDetails()
    {
        return $this->transactionDetails;
    }

    /**
     * @return \Genkgo\Camt\DTO\EntryTransactionDetail|null
     */
    public function getTransactionDetail()
    {
        if (isset($this->transactionDetails[0])) {
            return $this->transactionDetails[0];
        }

        return null;
    }

    /**
     * @return bool
     */
    public function getReversalIndicator()
    {
        return $this->reversalIndicator;
    }

    /**
     * @param bool $reversalIndicator
     * @return void
     */
    public function setReversalIndicator($reversalIndicator)
    {
        $this->reversalIndicator = $reversalIndicator;
    }

    /**
     * @return string|null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     * @return void
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Unique reference as assigned by the account servicing institution to unambiguously identify the entry.
     * @return string|null
     */
    public function getAccountServicerReference()
    {
        return $this->accountServicerReference;
    }

    /**
     * @param string|null $accountServicerReference
     * @return void
     */
    public function setAccountServicerReference($accountServicerReference)
    {
        $this->accountServicerReference = $accountServicerReference;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param string|null $batchPaymentId
     * @return void
     */
    public function setBatchPaymentId($batchPaymentId)
    {
        $this->batchPaymentId = trim((string) $batchPaymentId);
    }

    /**
     * @return string|null
     */
    public function getBatchPaymentId()
    {
        return $this->batchPaymentId;
    }

    /**
     * @return string|null
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param string|null $additionalInfo
     * @return void
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * @return \Genkgo\Camt\DTO\BankTransactionCode|null
     */
    public function getBankTransactionCode()
    {
        return $this->bankTransactionCode;
    }

    /**
     * @param \Genkgo\Camt\DTO\BankTransactionCode|null $bankTransactionCode
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
     * @param \DateTimeImmutable|null $date
     * @return void
     */
    public function setBookingDate($date)
    {
        $this->bookingDate = $date;
    }

    /**
     * @param \DateTimeImmutable|null $date
     * @return void
     */
    public function setValueDate($date)
    {
        $this->valueDate = $date;
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getCreditDebitIndicator()
    {
        return $this->creditDebitIndicator;
    }

    /**
     * @param string|null $creditDebitIndicator
     * @return void
     */
    public function setCreditDebitIndicator($creditDebitIndicator)
    {
        $this->creditDebitIndicator = $creditDebitIndicator;
    }
}
