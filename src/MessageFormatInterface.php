<?php

namespace Genkgo\Camt;

/**
 * Interface MessageFormatInterface.
 */
interface MessageFormatInterface
{
    /**
     * @return string
     */
    public function getXmlNs();

    /**
     * @return string
     */
    public function getMsgId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return \Genkgo\Camt\DecoderInterface
     */
    public function getDecoder();
}
