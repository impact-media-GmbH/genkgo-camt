<?php

namespace Genkgo\TestCamt\Unit;

use Genkgo\Camt\Iban;
use InvalidArgumentException;
use PHPUnit\Framework;

class IbanTest extends Framework\TestCase
{
    /**
     * @return void
     */
    public function testValidIbanMachineFormat()
    {
        $iban = new Iban($expected = 'NL91ABNA0417164300');

        self::assertEquals($expected, $iban->getIban());
        self::assertEquals($expected, $iban);
    }

    /**
     * @return void
     */
    public function testValidIbanHumanFormat()
    {
        $expected = 'NL91ABNA0417164300';

        $iban = new Iban('IBAN NL91 ABNA 0417 1643 00');

        self::assertEquals($expected, $iban->getIban());
        self::assertEquals($expected, $iban);
    }

    /**
     * @return void
     */
    public function testInvalidIban()
    {
        $this->expectException(InvalidArgumentException::class);

        new Iban('NL91ABNA0417164301');
    }
}
