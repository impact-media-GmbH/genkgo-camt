<?php

namespace Genkgo\Camt\Camt052\Decoder\V04;

use Genkgo\Camt\Camt052\Decoder\Message as BaseMessageDecoder;
use SimpleXMLElement;

class Message extends BaseMessageDecoder
{
    /**
     * @inheritDoc
     * @param \SimpleXMLElement $document
     * @return \SimpleXMLElement
     */
    public function getRootElement($document)
    {
        return $document->BkToCstmrAcctRpt;
    }
}
