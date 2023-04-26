<?php

namespace Genkgo\Camt\DTO;

class ProprietaryReference
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $reference;

    /**
     * @param string|null $type
     * @param string|null $reference
     */
    public function __construct($type, $reference)
    {
        $this->type = $type;
        $this->reference = $reference;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getReference()
    {
        return $this->reference;
    }
}
