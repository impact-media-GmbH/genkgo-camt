<?php

namespace Genkgo\Camt\DTO;

class ProprietaryAccount extends Account
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $id = (string) $id;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return (string) $this->id;
    }

    /**
     * @inheritDoc
     * @return string
     */
    public function getIdentification()
    {
        return (string) $this->id;
    }
}
