<?php

namespace Genkgo\Camt;

use Genkgo\Camt\Camt052;
use Genkgo\Camt\Camt053;
use Genkgo\Camt\Camt054;

class Config
{
    /**
     * @var MessageFormatInterface[]
     */
    private $messageFormats = [];

    /**
     * @var bool
     */
    private $xsdValidation = true;

    /**
     * @param \Genkgo\Camt\MessageFormatInterface $messageFormat
     * @return void
     */
    public function addMessageFormat($messageFormat)
    {
        $this->messageFormats[] = $messageFormat;
    }

    /**
     * @return MessageFormatInterface[]
     */
    public function getMessageFormats()
    {
        return $this->messageFormats;
    }

    /**
     * @return void
     */
    public function disableXsdValidation()
    {
        $this->xsdValidation = false;
    }

    /**
     * @return bool
     */
    public function getXsdValidation()
    {
        return $this->xsdValidation;
    }

    /**
     * @return $this
     */
    public static function getDefault()
    {
        $config = new self();
        $config->addMessageFormat(new Camt052\MessageFormat\V01());
        $config->addMessageFormat(new Camt052\MessageFormat\V02());
        $config->addMessageFormat(new Camt052\MessageFormat\V04());
        $config->addMessageFormat(new Camt052\MessageFormat\V06());
        $config->addMessageFormat(new Camt052\MessageFormat\V08());
        $config->addMessageFormat(new Camt053\MessageFormat\V02());
        $config->addMessageFormat(new Camt053\MessageFormat\V03());
        $config->addMessageFormat(new Camt053\MessageFormat\V04());
        $config->addMessageFormat(new Camt053\MessageFormat\V08());
        $config->addMessageFormat(new Camt054\MessageFormat\V02());
        $config->addMessageFormat(new Camt054\MessageFormat\V04());
        $config->addMessageFormat(new Camt054\MessageFormat\V08());

        return $config;
    }
}
