<?php

namespace Genkgo\Camt;

use Iban\Validation\Iban as IbanDetails;
use Iban\Validation\Validator;
use InvalidArgumentException;

class Iban
{
    /**
     * @var string
     */
    private $iban;

    /**
     * @param string $iban
     */
    public function __construct($iban)
    {
        $iban = (string) $iban;
        $iban = new IbanDetails($iban);

        if (!(new Validator())->validate($iban)) {
            throw new InvalidArgumentException("Unknown IBAN {$iban}");
        }

        $this->iban = $iban->getNormalizedIban();
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     * @return bool
     */
    public function equals($iban)
    {
        return (new IbanDetails($iban))->getNormalizedIban() === $this->iban;
    }
}
