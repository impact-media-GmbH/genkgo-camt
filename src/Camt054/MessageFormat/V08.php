<?php

namespace Genkgo\Camt\Camt054\MessageFormat;

use Genkgo\Camt\Camt054;
use Genkgo\Camt\Decoder;
use Genkgo\Camt\DecoderInterface;
use Genkgo\Camt\MessageFormatInterface;

final class V08 implements MessageFormatInterface
{
    /**
     * @return string
     */
    public function getXmlNs()
    {
        return 'urn:iso:std:iso:20022:tech:xsd:camt.054.001.08';
    }

    /**
     * @return string
     */
    public function getMsgId()
    {
        return 'camt.054.001.08';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'BankToCustomerDebitCreditNotificationV08';
    }

    /**
     * @return \Genkgo\Camt\DecoderInterface
     */
    public function getDecoder()
    {
        $entryTransactionDetailDecoder = new Camt054\Decoder\EntryTransactionDetail(new Decoder\Date());
        $entryDecoder = new Decoder\Entry($entryTransactionDetailDecoder);
        $recordDecoder = new Decoder\Record($entryDecoder, new Decoder\Date());
        $messageDecoder = new Camt054\Decoder\V08\Message($recordDecoder, new Decoder\Date());

        return new Decoder($messageDecoder, sprintf('/assets/%s.xsd', $this->getMsgId()));
    }
}
