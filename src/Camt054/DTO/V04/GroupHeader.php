<?php

namespace Genkgo\Camt\Camt054\DTO\V04;

use Genkgo\Camt\DTO\GroupHeader as BaseGroupHeader;

class GroupHeader extends BaseGroupHeader
{
    /**
     * @var \Genkgo\Camt\Camt054\DTO\V04\OriginalBusinessQuery|null
     */
    private $originalBusinessQuery;

    /**
     * @return \Genkgo\Camt\Camt054\DTO\V04\OriginalBusinessQuery|null
     */
    public function getOriginalBusinessQuery()
    {
        return $this->originalBusinessQuery;
    }

    /**
     * @param \Genkgo\Camt\Camt054\DTO\V04\OriginalBusinessQuery $originalBusinessQuery
     * @return $this
     */
    public function setOriginalBusinessQuery($originalBusinessQuery)
    {
        $this->originalBusinessQuery = $originalBusinessQuery;

        return $this;
    }
}
