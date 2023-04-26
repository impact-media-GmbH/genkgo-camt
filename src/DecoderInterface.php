<?php

namespace Genkgo\Camt;

use DOMDocument;
use Genkgo\Camt\DTO\Message;

interface DecoderInterface
{
    /**
     * @param \DOMDocument $document
     * @param bool $xsdValidation
     * @return \Genkgo\Camt\DTO\Message
     */
    public function decode($document, $xsdValidation = true);
}
