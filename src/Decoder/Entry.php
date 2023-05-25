<?php

namespace Genkgo\Camt\Decoder;

use Genkgo\Camt\DTO;
use SimpleXMLElement;

class Entry
{
    /**
     * @var \Genkgo\Camt\Decoder\EntryTransactionDetail
     */
    private $entryTransactionDetailDecoder;

    public function __construct(EntryTransactionDetail $entryTransactionDetailDecoder)
    {
        $this->entryTransactionDetailDecoder = $entryTransactionDetailDecoder;
    }

    /**
     * @param \Genkgo\Camt\DTO\Entry $entry
     * @param \SimpleXMLElement $xmlEntry
     * @return void
     */
    public function addTransactionDetails($entry, $xmlEntry)
    {
        $xmlDetails = $xmlEntry->NtryDtls->TxDtls;

        if ($xmlDetails !== null) {
            foreach ($xmlDetails as $xmlDetail) {
                $detail = new DTO\EntryTransactionDetail();
                $this->entryTransactionDetailDecoder->addCreditDebitIdentifier($detail, $xmlEntry->CdtDbtInd);
                $this->entryTransactionDetailDecoder->addReference($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addRelatedParties($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addRelatedAgents($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addRemittanceInformation($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addRelatedDates($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addReturnInformation($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addAdditionalTransactionInformation($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addBankTransactionCode($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addCharges($detail, $xmlDetail);
                $this->entryTransactionDetailDecoder->addAmountDetails($detail, $xmlDetail, $xmlEntry->CdtDbtInd);
                $this->entryTransactionDetailDecoder->addAmount($detail, $xmlDetail, $xmlEntry->CdtDbtInd);

                $entry->addTransactionDetail($detail);
            }
        }
    }
}
