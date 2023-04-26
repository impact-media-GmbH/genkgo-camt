<?php

namespace Genkgo\Camt\Camt053\MessageFormat;

use Genkgo\Camt\Camt053;
use Genkgo\Camt\Decoder;
use Genkgo\Camt\DecoderInterface;
use Genkgo\Camt\MessageFormatInterface;

final class V03 implements MessageFormatInterface
{
    /**
     * @return string
     */
    public function getXmlNs()
    {
        return 'urn:iso:std:iso:20022:tech:xsd:camt.053.001.03';
    }

    /**
     * @return string
     */
    public function getMsgId()
    {
        return 'camt.053.001.03';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'BankToCustomerStatementV03';
    }

    /**
     * @return \Genkgo\Camt\DecoderInterface
     */
    public function getDecoder()
    {
        $entryTransactionDetailDecoder = new Camt053\Decoder\EntryTransactionDetail(new Decoder\Date());
        $entryDecoder = new Decoder\Entry($entryTransactionDetailDecoder);
        $recordDecoder = new Decoder\Record($entryDecoder, new Decoder\Date());
        $messageDecoder = new Camt053\Decoder\Message($recordDecoder, new Decoder\Date());

        return new Decoder($messageDecoder, sprintf('/assets/%s.xsd', $this->getMsgId()));
    }
}
