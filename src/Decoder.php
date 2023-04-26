<?php

namespace Genkgo\Camt;

use DOMDocument;
use Genkgo\Camt\DTO\Message;
use Genkgo\Camt\Exception\InvalidMessageException;
use SimpleXMLElement;

class Decoder implements DecoderInterface
{
    /**
     * @var \SimpleXMLElement
     */
    private $document;

    /**
     * @var \Genkgo\Camt\Decoder\Message
     */
    private $messageDecoder;

    /**
     * Path to the schema definition.
     * @var string
     */
    protected $schemeDefinitionPath;

    /**
     * @param string $schemeDefinitionPath
     */
    public function __construct(Decoder\Message $messageDecoder, $schemeDefinitionPath)
    {
        $schemeDefinitionPath = (string) $schemeDefinitionPath;
        $this->messageDecoder = $messageDecoder;
        $this->schemeDefinitionPath = $schemeDefinitionPath;
    }

    /**
     * @return void
     */
    private function validate(DOMDocument $document)
    {
        libxml_use_internal_errors(true);
        $valid = $document->schemaValidate(dirname(__DIR__) . $this->schemeDefinitionPath);
        $errors = libxml_get_errors();
        libxml_clear_errors();

        if (!$valid) {
            $messages = [];
            foreach ($errors as $error) {
                $messages[] = $error->message;
            }

            $errorMessage = implode("\n", $messages);

            throw new InvalidMessageException("Provided XML is not valid according to the XSD:\n{$errorMessage}");
        }
    }

    /**
     * @param \DOMDocument $document
     * @param bool $xsdValidation
     * @return \Genkgo\Camt\DTO\Message
     */
    public function decode($document, $xsdValidation = true)
    {
        if ($xsdValidation === true) {
            $this->validate($document);
        }

        $document = simplexml_import_dom($document);
        if (!$document) {
            throw new InvalidMessageException('Provided XML could not be parsed');
        }

        $this->document = $document;

        $message = new DTO\Message();
        $this->messageDecoder->addGroupHeader($message, $this->document);
        $this->messageDecoder->addRecords($message, $this->document);

        return $message;
    }
}
