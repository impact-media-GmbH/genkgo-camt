<?php

namespace Genkgo\Camt\Camt052\MessageFormat;

use Genkgo\Camt\Camt052;
use Genkgo\Camt\Decoder;
use Genkgo\Camt\DecoderInterface;
use Genkgo\Camt\MessageFormatInterface;

final class V01 implements MessageFormatInterface
{
    /**
     * @return string
     */
    public function getXmlNs()
    {
        return 'urn:iso:std:iso:20022:tech:xsd:camt.052.001.01';
    }

    /**
     * @return string
     */
    public function getMsgId()
    {
        return 'camt.052.001.01';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'BankToCustomerAccountReportV01';
    }

    /**
     * @return \Genkgo\Camt\DecoderInterface
     */
    public function getDecoder()
    {
        $entryTransactionDetailDecoder = new Camt052\Decoder\EntryTransactionDetail(new Decoder\Date());
        $entryDecoder = new Decoder\Entry($entryTransactionDetailDecoder);
        $recordDecoder = new Decoder\Record($entryDecoder, new Decoder\Date());
        $messageDecoder = new Camt052\Decoder\V01\Message($recordDecoder, new Decoder\Date());

        return new Decoder($messageDecoder, sprintf('/assets/%s.xsd', $this->getMsgId()));
    }
}
