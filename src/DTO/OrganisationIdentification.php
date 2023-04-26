<?php

namespace Genkgo\Camt\DTO;

class OrganisationIdentification extends Identification
{
    /**
     * @var string|null
     */
    private $bic;

    /**
     * @var string|null
     */
    private $ibei;

    /**
     * @var string|null
     */
    private $bei;

    /**
     * @var string|null
     */
    private $eangln;

    /**
     * @var string|null
     */
    private $chipsUniversalId;

    /**
     * @var string|null
     */
    private $duns;

    /**
     * @var string|null
     */
    private $bankPartyId;

    /**
     * @var string|null
     */
    private $taxId;

    /**
     * @var string|null
     */
    private $issuer;

    /**
     * @var string|null
     */
    private $otherId;

    /**
     * @var string|null
     */
    private $otherIssuer;

    /**
     * @var string|null
     */
    private $otherSchemeName;

    /**
     * @var string|null
     */
    private $otherType;

    /**
     * @return string|null
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     * @return void
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
        $this->identification = $bic;
    }

    /**
     * @return string|null
     */
    public function getIbei()
    {
        return $this->ibei;
    }

    /**
     * @param string $ibei
     * @return void
     */
    public function setIbei($ibei)
    {
        $this->ibei = $ibei;
        $this->identification = $ibei;
    }

    /**
     * @return string|null
     */
    public function getBei()
    {
        return $this->bei;
    }

    /**
     * @param string $bei
     * @return void
     */
    public function setBei($bei)
    {
        $this->bei = $bei;
        $this->identification = $bei;
    }

    /**
     * @return string|null
     */
    public function getEangln()
    {
        return $this->eangln;
    }

    /**
     * @param string $eangln
     * @return void
     */
    public function setEangln($eangln)
    {
        $this->eangln = $eangln;
        $this->identification = $eangln;
    }

    /**
     * @return string|null
     */
    public function getChipsUniversalId()
    {
        return $this->chipsUniversalId;
    }

    /**
     * @param string $chipsUniversalId
     * @return void
     */
    public function setChipsUniversalId($chipsUniversalId)
    {
        $this->chipsUniversalId = $chipsUniversalId;
        $this->identification = $chipsUniversalId;
    }

    /**
     * @return string|null
     */
    public function getDuns()
    {
        return $this->duns;
    }

    /**
     * @param string $duns
     * @return void
     */
    public function setDuns($duns)
    {
        $this->duns = $duns;
        $this->identification = $duns;
    }

    /**
     * @return string|null
     */
    public function getBankPartyId()
    {
        return $this->bankPartyId;
    }

    /**
     * @param string $bankPartyId
     * @return void
     */
    public function setBankPartyId($bankPartyId)
    {
        $this->bankPartyId = $bankPartyId;
        $this->identification = $bankPartyId;
    }

    /**
     * @return string|null
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * @param string $taxId
     * @return void
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
        $this->identification = $taxId;
    }

    /**
     * @return string|null
     */
    public function getOtherId()
    {
        return $this->otherId;
    }

    /**
     * @param string $otherId
     * @return void
     */
    public function setOtherId($otherId)
    {
        $this->otherId = $otherId;
        $this->identification = $otherId;
    }

    /**
     * @return string|null
     */
    public function getOtherIssuer()
    {
        return $this->otherIssuer;
    }

    /**
     * @param string $otherIssuer
     * @return void
     */
    public function setOtherIssuer($otherIssuer)
    {
        $this->otherIssuer = $otherIssuer;
    }

    /**
     * @return string|null
     */
    public function getOtherSchemeName()
    {
        return $this->otherSchemeName;
    }

    /**
     * @param string $otherSchemeName
     * @return void
     */
    public function setOtherSchemeName($otherSchemeName)
    {
        $this->otherSchemeName = $otherSchemeName;
    }

    /**
     * @return string|null
     */
    public function getOtherType()
    {
        return $this->otherType;
    }

    /**
     * @param string $otherType
     * @return void
     */
    public function setOtherType($otherType)
    {
        $this->otherType = $otherType;
    }

    /**
     * @return string|null
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * @param string $issuer
     * @return void
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
        $this->identification = $issuer;
    }
}
