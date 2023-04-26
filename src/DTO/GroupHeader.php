<?php

namespace Genkgo\Camt\DTO;

use DateTimeImmutable;

class GroupHeader
{
    /**
     * @var string
     */
    private $messageId;

    /**
     * @var \DateTimeImmutable
     */
    private $createdOn;

    /**
     * @var string|null
     */
    private $additionalInformation;

    /**
     * @var \Genkgo\Camt\DTO\Recipient|null
     */
    private $messageRecipient;

    /**
     * @var \Genkgo\Camt\DTO\Pagination|null
     */
    private $pagination;

    /**
     * @param string $messageId
     */
    public function __construct($messageId, DateTimeImmutable $createdOn)
    {
        $messageId = (string) $messageId;
        $this->messageId = $messageId;
        $this->createdOn = $createdOn;
    }

    /**
     * @return string
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @return string|null
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }

    /**
     * @param string $additionalInformation
     * @return void
     */
    public function setAdditionalInformation($additionalInformation)
    {
        $this->additionalInformation = $additionalInformation;
    }

    /**
     * @return \Genkgo\Camt\DTO\Recipient|null
     */
    public function getMessageRecipient()
    {
        return $this->messageRecipient;
    }

    /**
     * @param \Genkgo\Camt\DTO\Recipient $messageRecipient
     * @return void
     */
    public function setMessageRecipient($messageRecipient)
    {
        $this->messageRecipient = $messageRecipient;
    }

    /**
     * @return \Genkgo\Camt\DTO\Pagination|null
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param \Genkgo\Camt\DTO\Pagination|null $pagination
     * @return void
     */
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
    }
}
