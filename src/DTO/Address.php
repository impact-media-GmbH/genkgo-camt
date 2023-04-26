<?php

namespace Genkgo\Camt\DTO;

class Address
{
    /**
     * @var string|null
     */
    private $country;

    /**
     * @var string|null
     */
    private $countrySubDivision;

    /**
     * @var string[]
     */
    private $addressLines = [];

    /**
     * @var string|null
     */
    private $department;

    /**
     * @var string|null
     */
    private $subDepartment;

    /**
     * @var string|null
     */
    private $streetName;

    /**
     * @var string|null
     */
    private $buildingNumber;

    /**
     * @var string|null
     */
    private $postCode;

    /**
     * @var string|null
     */
    private $townName;

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return static
     * @param string $country
     */
    public function setCountry($country)
    {
        $cloned = clone $this;
        $cloned->country = $country;

        return $cloned;
    }

    /**
     * @return string|null
     */
    public function getCountrySubDivision()
    {
        return $this->countrySubDivision;
    }

    /**
     * @return static
     * @param string $countrySubDivision
     */
    public function setCountrySubDivision($countrySubDivision)
    {
        $cloned = clone $this;
        $cloned->countrySubDivision = $countrySubDivision;

        return $cloned;
    }

    /**
     * @return string[]
     */
    public function getAddressLines()
    {
        return $this->addressLines;
    }

    /**
     * @param string[] $addressLines
     *
     * @return static
     */
    public function setAddressLines($addressLines)
    {
        $cloned = clone $this;
        $cloned->addressLines = $addressLines;

        return $cloned;
    }

    /**
     * @return static
     * @param string $addressLine
     */
    public function addAddressLine($addressLine)
    {
        $cloned = clone $this;
        $cloned->addressLines[] = $addressLine;

        return $cloned;
    }

    /**
     * @return string|null
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @return static
     * @param string $department
     */
    public function setDepartment($department)
    {
        $cloned = clone $this;
        $cloned->department = $department;

        return $cloned;
    }

    /**
     * @return string|null
     */
    public function getSubDepartment()
    {
        return $this->subDepartment;
    }

    /**
     * @return static
     * @param string $subDepartment
     */
    public function setSubDepartment($subDepartment)
    {
        $cloned = clone $this;
        $cloned->subDepartment = $subDepartment;

        return $cloned;
    }

    /**
     * @return string|null
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @return static
     * @param string $streetName
     */
    public function setStreetName($streetName)
    {
        $cloned = clone $this;
        $cloned->streetName = $streetName;

        return $cloned;
    }

    /**
     * @return string|null
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * @return static
     * @param string $buildingNumber
     */
    public function setBuildingNumber($buildingNumber)
    {
        $cloned = clone $this;
        $cloned->buildingNumber = $buildingNumber;

        return $cloned;
    }

    /**
     * @return string|null
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @return static
     * @param string $postCode
     */
    public function setPostCode($postCode)
    {
        $cloned = clone $this;
        $cloned->postCode = $postCode;

        return $cloned;
    }

    /**
     * @return string|null
     */
    public function getTownName()
    {
        return $this->townName;
    }

    /**
     * @return static
     * @param string $townName
     */
    public function setTownName($townName)
    {
        $cloned = clone $this;
        $cloned->townName = $townName;

        return $cloned;
    }
}
