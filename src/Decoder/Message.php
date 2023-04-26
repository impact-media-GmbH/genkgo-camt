<?php

namespace Genkgo\Camt\Decoder;

use Genkgo\Camt\Decoder\Factory\DTO as DTOFactory;
use Genkgo\Camt\DTO;
use SimpleXMLElement;

abstract class Message
{
    /**
     * @var \Genkgo\Camt\Decoder\Record
     */
    protected $recordDecoder;

    /**
     * @var \Genkgo\Camt\Decoder\DateDecoderInterface
     */
    protected $dateDecoder;

    /**
     * Message constructor.
     */
    public function __construct(Record $recordDecoder, DateDecoderInterface $dateDecoder)
    {
        $this->recordDecoder = $recordDecoder;
        $this->dateDecoder = $dateDecoder;
    }

    /**
     * @param \Genkgo\Camt\DTO\Message $message
     * @param \SimpleXMLElement $document
     * @return void
     */
    public function addGroupHeader($message, $document)
    {
        $xmlGroupHeader = $this->getRootElement($document)->GrpHdr;
        $groupHeader = new DTO\GroupHeader(
            (string) $xmlGroupHeader->MsgId,
            $this->dateDecoder->decode((string) $xmlGroupHeader->CreDtTm)
        );

        if (isset($xmlGroupHeader->AddtlInf)) {
            $groupHeader->setAdditionalInformation((string) $xmlGroupHeader->AddtlInf);
        }

        if (isset($xmlGroupHeader->MsgRcpt)) {
            $groupHeader->setMessageRecipient(
                DTOFactory\Recipient::createFromXml($xmlGroupHeader->MsgRcpt)
            );
        }

        if (isset($xmlGroupHeader->MsgPgntn)) {
            $groupHeader->setPagination(new DTO\Pagination(
                (string) $xmlGroupHeader->MsgPgntn->PgNb,
                ('true' === (string) $xmlGroupHeader->MsgPgntn->LastPgInd) ? true : false
            ));
        }

        $message->setGroupHeader($groupHeader);
    }

    /**
     * @param \Genkgo\Camt\DTO\Record $record
     * @param \SimpleXMLElement $xmlRecord
     * @return void
     */
    public function addCommonRecordInformation($record, $xmlRecord)
    {
        if (isset($xmlRecord->ElctrncSeqNb)) {
            $record->setElectronicSequenceNumber((string) $xmlRecord->ElctrncSeqNb);
        }
        if (isset($xmlRecord->CpyDplctInd)) {
            $record->setCopyDuplicateIndicator((string) $xmlRecord->CpyDplctInd);
        }
        if (isset($xmlRecord->LglSeqNb)) {
            $record->setLegalSequenceNumber((string) $xmlRecord->LglSeqNb);
        }
        if (isset($xmlRecord->FrToDt)) {
            $record->setFromDate($this->dateDecoder->decode((string) $xmlRecord->FrToDt->FrDtTm));
            $record->setToDate($this->dateDecoder->decode((string) $xmlRecord->FrToDt->ToDtTm));
        }
    }

    /**
     * @param \Genkgo\Camt\DTO\Message $message
     * @param \SimpleXMLElement $document
     * @return void
     */
    abstract public function addRecords($message, $document);

    /**
     * @param \SimpleXMLElement $document
     * @return \SimpleXMLElement
     */
    abstract public function getRootElement($document);
}
