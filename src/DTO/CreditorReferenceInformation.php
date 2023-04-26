<?php

namespace Genkgo\Camt\DTO;

class CreditorReferenceInformation
{
    /**
     * @var string|null
     */
    private $ref;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $proprietary;

    /**
     * @return string|null
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string|null $ref
     * @return void
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @param string $ref
     * @return $this
     */
    public static function fromUnstructured($ref)
    {
        $information = new self();
        $information->ref = $ref;

        return $information;
    }

    /**
     * @return string|null
     */
    public function getProprietary()
    {
        return $this->proprietary;
    }

    /**
     * @param string|null $proprietary
     * @return void
     */
    public function setProprietary($proprietary)
    {
        $this->proprietary = $proprietary;
    }

    /**
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return void
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
}
