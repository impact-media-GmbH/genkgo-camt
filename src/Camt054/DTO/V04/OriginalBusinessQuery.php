<?php

namespace Genkgo\Camt\Camt054\DTO\V04;

use DateTimeImmutable;

class OriginalBusinessQuery
{
    /**
     * @var string
     */
    private $messageId;

    /**
     * @var string|null
     */
    private $messageNameId;

    /**
     * @var \DateTimeImmutable|null
     */
    private $createdOn;

    /**
     * @param string $messageId
     */
    public function __construct($messageId)
    {
        $messageId = (string) $messageId;
        $this->messageId = $messageId;
    }

    /**
     * @return string
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @return string|null
     */
    public function getMessageNameId()
    {
        return $this->messageNameId;
    }

    /**
     * @param string $messageNameId
     * @return $this
     */
    public function setMessageNameId($messageNameId)
    {
        $this->messageNameId = $messageNameId;

        return $this;
    }

    /**
     * @param \DateTimeImmutable $createdOn
     * @return $this
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }
}
