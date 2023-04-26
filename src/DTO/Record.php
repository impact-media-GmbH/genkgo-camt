<?php

namespace Genkgo\Camt\DTO;

use DateTimeImmutable;

abstract class Record
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var \DateTimeImmutable
     */
    protected $createdOn;

    /**
     * @var \Genkgo\Camt\DTO\Account
     */
    protected $account;

    /**
     * @var \Genkgo\Camt\DTO\Pagination|null
     */
    protected $pagination;

    /**
     * @var string|null
     */
    protected $electronicSequenceNumber;

    /**
     * @var string|null
     */
    protected $legalSequenceNumber;

    /**
     * @var string|null
     */
    protected $copyDuplicateIndicator;

    /**
     * @var \DateTimeImmutable|null
     */
    protected $fromDate;

    /**
     * @var \DateTimeImmutable|null
     */
    protected $toDate;

    /**
     * @var Entry[]
     */
    protected $entries = [];

    /**
     * @var string|null
     */
    protected $additionalInformation;

    /**
     * @param string $id
     */
    public function __construct($id, DateTimeImmutable $createdOn, Account $account)
    {
        $id = (string) $id;
        $this->id = $id;
        $this->createdOn = $createdOn;
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @return \Genkgo\Camt\DTO\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return \Genkgo\Camt\DTO\Pagination|null
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param \Genkgo\Camt\DTO\Pagination $pagination
     * @return void
     */
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
    }

    /**
     * @return string|null
     */
    public function getElectronicSequenceNumber()
    {
        return $this->electronicSequenceNumber;
    }

    /**
     * @param string $electronicSequenceNumber
     * @return void
     */
    public function setElectronicSequenceNumber($electronicSequenceNumber)
    {
        $this->electronicSequenceNumber = $electronicSequenceNumber;
    }

    /**
     * @return string|null
     */
    public function getLegalSequenceNumber()
    {
        return $this->legalSequenceNumber;
    }

    /**
     * @param string $legalSequenceNumber
     * @return void
     */
    public function setLegalSequenceNumber($legalSequenceNumber)
    {
        $this->legalSequenceNumber = $legalSequenceNumber;
    }

    /**
     * @return string|null
     */
    public function getCopyDuplicateIndicator()
    {
        return $this->copyDuplicateIndicator;
    }

    /**
     * @param string $copyDuplicateIndicator
     * @return void
     */
    public function setCopyDuplicateIndicator($copyDuplicateIndicator)
    {
        $this->copyDuplicateIndicator = $copyDuplicateIndicator;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @param \DateTimeImmutable $fromDate
     * @return void
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * @param \DateTimeImmutable $toDate
     * @return void
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    /**
     * @param \Genkgo\Camt\DTO\Entry $entry
     * @return void
     */
    public function addEntry($entry)
    {
        $this->entries[] = $entry;
    }

    /**
     * @return Entry[]
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @return string|null
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }

    /**
     * @param string $additionalInformation
     * @return void
     */
    public function setAdditionalInformation($additionalInformation)
    {
        $this->additionalInformation = $additionalInformation;
    }
}
