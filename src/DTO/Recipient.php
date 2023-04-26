<?php

namespace Genkgo\Camt\DTO;

class Recipient implements RelatedPartyTypeInterface
{
    /**
     * @var \Genkgo\Camt\DTO\Address|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $countryOfResidence;

    /**
     * @var \Genkgo\Camt\DTO\ContactDetails|null
     */
    private $contactDetails;

    /**
     * @var \Genkgo\Camt\DTO\Identification|null
     */
    private $identification;
    /**
     * @var string|null
     */
    private $name;

    /**
     * @param string|null $name
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }

    /**
     * @return \Genkgo\Camt\DTO\Address|null
     */
    public function getAddress()
    {
        return $this->address;
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
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getCountryOfResidence()
    {
        return $this->countryOfResidence;
    }

    /**
     * @param string $countryOfResidence
     * @return void
     */
    public function setCountryOfResidence($countryOfResidence)
    {
        $this->countryOfResidence = $countryOfResidence;
    }

    /**
     * @return \Genkgo\Camt\DTO\ContactDetails|null
     */
    public function getContactDetails()
    {
        return $this->contactDetails;
    }

    /**
     * @param \Genkgo\Camt\DTO\ContactDetails $contactDetails
     * @return void
     */
    public function setContactDetails($contactDetails)
    {
        $this->contactDetails = $contactDetails;
    }

    /**
     * @return \Genkgo\Camt\DTO\Identification|null
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param \Genkgo\Camt\DTO\Identification $identification
     * @return void
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
    }
}
