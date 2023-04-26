<?php

namespace Genkgo\Camt\DTO;

class RemittanceInformation
{
    /**
     * @var string|null
     */
    private $message;

    /**
     * @var \Genkgo\Camt\DTO\CreditorReferenceInformation|null
     */
    private $creditorReferenceInformation;

    /**
     * @var StructuredRemittanceInformation[]
     */
    private $structuredBlocks = [];

    /**
     * @var UnstructuredRemittanceInformation[]
     */
    private $unstructuredBlocks = [];

    /**
     * @param string $message
     * @return $this
     */
    public static function fromUnstructured($message)
    {
        $information = new self();
        $information->message = $message;

        return $information;
    }

    /**
     * @return \Genkgo\Camt\DTO\CreditorReferenceInformation|null
     */
    public function getCreditorReferenceInformation()
    {
        return $this->creditorReferenceInformation;
    }

    /**
     * @param \Genkgo\Camt\DTO\CreditorReferenceInformation $creditorReferenceInformation
     * @return void
     */
    public function setCreditorReferenceInformation($creditorReferenceInformation)
    {
        $this->creditorReferenceInformation = $creditorReferenceInformation;
        $this->message = $creditorReferenceInformation->getRef();
    }

    /**
     * @deprecated Use getStructuredBlocks method instead
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @deprecated Use addStructuredBlock method instead
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param \Genkgo\Camt\DTO\StructuredRemittanceInformation $structuredRemittanceInformation
     * @return void
     */
    public function addStructuredBlock($structuredRemittanceInformation)
    {
        $this->structuredBlocks[] = $structuredRemittanceInformation;
    }

    /**
     * @return StructuredRemittanceInformation[]
     */
    public function getStructuredBlocks()
    {
        return $this->structuredBlocks;
    }

    /**
     * @return \Genkgo\Camt\DTO\StructuredRemittanceInformation|null
     */
    public function getStructuredBlock()
    {
        if (isset($this->structuredBlocks[0])) {
            return $this->structuredBlocks[0];
        }

        return null;
    }

    /**
     * @param \Genkgo\Camt\DTO\UnstructuredRemittanceInformation $unstructuredRemittanceInformation
     * @return void
     */
    public function addUnstructuredBlock($unstructuredRemittanceInformation)
    {
        $this->unstructuredBlocks[] = $unstructuredRemittanceInformation;
    }

    /**
     * @return UnstructuredRemittanceInformation[]
     */
    public function getUnstructuredBlocks()
    {
        return $this->unstructuredBlocks;
    }

    /**
     * @return \Genkgo\Camt\DTO\UnstructuredRemittanceInformation|null
     */
    public function getUnstructuredBlock()
    {
        if (isset($this->unstructuredBlocks[0])) {
            return $this->unstructuredBlocks[0];
        }

        return null;
    }
}
