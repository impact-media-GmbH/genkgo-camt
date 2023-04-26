<?php

namespace Genkgo\Camt\DTO;

class Debtor implements RelatedPartyTypeInterface
{
    /**
     * @var \Genkgo\Camt\DTO\Address|null
     */
    private $address;
    /**
     * @var string|null
     */
    private $name;

    /**
     * @param string|null $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param \Genkgo\Camt\DTO\Address $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \Genkgo\Camt\DTO\Address|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }
}
