<?php

namespace Genkgo\Camt\DTO;

class RelatedAgent
{
    /**
     * @var \Genkgo\Camt\DTO\RelatedAgentTypeInterface
     */
    private $relatedAgentDetails;

    /**
     * RelatedAgent constructor.
     */
    public function __construct(RelatedAgentTypeInterface $relatedAgentDetails)
    {
        $this->relatedAgentDetails = $relatedAgentDetails;
    }

    /**
     * @return \Genkgo\Camt\DTO\RelatedAgentTypeInterface
     */
    public function getRelatedAgentType()
    {
        return $this->relatedAgentDetails;
    }
}
