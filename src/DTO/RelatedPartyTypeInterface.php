<?php

namespace Genkgo\Camt\DTO;

/**
 * Interface RelatedPartyTypeInterface.
 */
interface RelatedPartyTypeInterface
{
    /**
     * @param string|null $name
     */
    public function __construct($name);

    /**
     * @param \Genkgo\Camt\DTO\Address $address
     * @return void
     */
    public function setAddress($address);

    /**
     * @return \Genkgo\Camt\DTO\Address|null
     */
    public function getAddress();

    /**
     * @return string|null
     */
    public function getName();
}
