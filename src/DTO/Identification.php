<?php

namespace Genkgo\Camt\DTO;

abstract class Identification
{
    /**
     * @var string|null
     */
    protected $identification;

    /**
     * @return string|null
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param string $identification
     * @return void
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
    }
}
