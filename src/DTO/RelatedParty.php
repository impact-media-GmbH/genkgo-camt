<?php

namespace Genkgo\Camt\DTO;

class RelatedParty
{
    /**
     * @var \Genkgo\Camt\DTO\RelatedPartyTypeInterface
     */
    private $relatedPartyDetails;

    /**
     * @var \Genkgo\Camt\DTO\Account|null
     */
    private $account;

    /**
     * @param \Genkgo\Camt\DTO\Account|null $account
     */
    public function __construct(RelatedPartyTypeInterface $relatedPartyDetails, $account)
    {
        $this->relatedPartyDetails = $relatedPartyDetails;
        $this->account = $account;
    }

    /**
     * @return \Genkgo\Camt\DTO\RelatedPartyTypeInterface
     */
    public function getRelatedPartyType()
    {
        return $this->relatedPartyDetails;
    }

    /**
     * @return \Genkgo\Camt\DTO\Account|null
     */
    public function getAccount()
    {
        return $this->account;
    }
}
