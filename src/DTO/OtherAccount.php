<?php

namespace Genkgo\Camt\DTO;

class OtherAccount extends Account
{
    /**
     * @var string
     */
    private $identification;

    /**
     * @var string|null
     */
    private $schemeName;

    /**
     * @var string|null
     */
    private $issuer;

    /**
     * @param string $identification
     */
    public function __construct($identification)
    {
        $identification = (string) $identification;
        $this->identification = $identification;
    }

    /**
     * @inheritDoc
     * @return string
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param string $schemeName
     * @return void
     */
    public function setSchemeName($schemeName)
    {
        $this->schemeName = $schemeName;
    }

    /**
     * @return string|null
     */
    public function getSchemeName()
    {
        return $this->schemeName;
    }

    /**
     * @param string $issuer
     * @return void
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    }

    /**
     * @return string|null
     */
    public function getIssuer()
    {
        return $this->issuer;
    }
}
