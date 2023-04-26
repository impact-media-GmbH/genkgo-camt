<?php

namespace Genkgo\Camt\Decoder;

use DateTimeImmutable;
use InvalidArgumentException;

class Date implements DateDecoderInterface
{
    /**
     * @var string|null
     */
    private $format;

    /**
     * @param string $date
     * @return \DateTimeImmutable
     */
    public function decode($date)
    {
        if ($this->format === null) {
            $result = new DateTimeImmutable($date);
        } else {
            $result = DateTimeImmutable::createFromFormat($this->format, $date);
        }

        if ($result === false) {
            throw new InvalidArgumentException("Cannot decode date {$date}");
        }

        return $result;
    }

    /**
     * @param string $format
     * @return $this
     */
    public static function fromFormat($format)
    {
        $decoder = new self();
        $decoder->format = $format;

        return $decoder;
    }
}
