<?php

namespace Genkgo\Camt\DTO;

use BadMethodCallException;

/**
 * Class RelatedParty
 *
 * @package Genkgo\Camt\DTO
 */
class RelatedParty
{
    /**
     * @var RelatedPartyTypeInterface
     */
    private $relatedPartyDetails;

    /**
     * @var null|Account
     */
    private $account;

    /**
     * @param RelatedPartyTypeInterface $relatedPartyDetails
     * @param null|Account $account
     */
    public function __construct(RelatedPartyTypeInterface $relatedPartyDetails, ?Account $account)
    {
        $this->relatedPartyDetails = $relatedPartyDetails;
        $this->account = $account;
    }

    /**
     * @return RelatedPartyTypeInterface
     */
    public function getRelatedPartyType()
    {
        return $this->relatedPartyDetails;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        if ($this->account === null) {
            throw new BadMethodCallException();
        }

        return $this->account;
    }
}
