<?php

namespace Genkgo\Camt;

use DOMDocument;
use Genkgo\Camt\DTO\Message;
use Genkgo\Camt\Exception\ReaderException;

class Reader
{
    /**
     * @var \Genkgo\Camt\Config
     */
    private $config;

    /**
     * @var \Genkgo\Camt\MessageFormatInterface|null
     */
    private $messageFormat;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param \DOMDocument $document
     * @return \Genkgo\Camt\DTO\Message
     */
    public function readDom($document)
    {
        if ($document->documentElement === null) {
            throw new ReaderException('Empty document');
        }

        $xmlNs = $document->documentElement->getAttribute('xmlns');
        $this->messageFormat = $this->getMessageFormatForXmlNs($xmlNs);

        return $this->messageFormat->getDecoder()->decode($document, $this->config->getXsdValidation());
    }

    /**
     * @param string $string
     * @return \Genkgo\Camt\DTO\Message
     */
    public function readString($string)
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->loadXML($string);

        return $this->readDom($dom);
    }

    /**
     * @param string $file
     * @return \Genkgo\Camt\DTO\Message
     */
    public function readFile($file)
    {
        if (!file_exists($file)) {
            throw new ReaderException("{$file} does not exists");
        }

        $string = file_get_contents($file);
        if ($string === false) {
            throw new ReaderException("Could not read file {$file}");
        }

        return $this->readString($string);
    }

    /**
     * @param string $xmlNs
     * @return \Genkgo\Camt\MessageFormatInterface
     */
    private function getMessageFormatForXmlNs($xmlNs)
    {
        $xmlNs = (string) $xmlNs;
        $messageFormats = $this->config->getMessageFormats();
        foreach ($messageFormats as $messageFormat) {
            if ($messageFormat->getXmlNs() === $xmlNs) {
                return $messageFormat;
            }
        }

        throw new ReaderException("Unsupported format, cannot find message format with xmlns {$xmlNs}");
    }

    /**
     * @return \Genkgo\Camt\MessageFormatInterface|null
     */
    public function getMessageFormat()
    {
        return $this->messageFormat;
    }
}
