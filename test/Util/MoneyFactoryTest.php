<?php

namespace Genkgo\TestCamt\Util;

use Genkgo\Camt\Util\MoneyFactory;
use Money\Money;
use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class MoneyFactoryTest extends TestCase
{
    /**
     * @dataProvider providerCreate
     * @param string $amount
     * @param string|null $CdtDbtInd
     * @param \Money\Money $expected
     * @return void
     */
    public function testCreate($amount, $CdtDbtInd, $expected)
    {
        $factory = new MoneyFactory();

        $xmlAmount = new SimpleXMLElement($amount);
        $xmlCdtDbtInd = $CdtDbtInd ? new SimpleXMLElement($CdtDbtInd) : null;
        $actual = $factory->create($xmlAmount, $xmlCdtDbtInd);

        self::assertTrue($actual->equals($expected));
    }

    /**
     * @return mixed[]
     */
    public static function providerCreate()
    {
        return [
            ['<Amt Ccy="CHF">27.50</Amt>', null, Money::CHF(2750)],
            ['<Amt Ccy="CHF">27.50</Amt>', '<CdtDbtInd>DBIT</CdtDbtInd>', Money::CHF(-2750)],
            ['<Amt Ccy="CHF">27.50</Amt>', '<CdtDbtInd>CRDT</CdtDbtInd>', Money::CHF(2750)],
            ['<Amt Ccy="JPY">27</Amt>', null, Money::JPY(27)],
            ['<Amt Ccy="JPY">27</Amt>', '<CdtDbtInd>DBIT</CdtDbtInd>', Money::JPY(-27)],
            ['<Amt Ccy="JPY">27</Amt>', '<CdtDbtInd>CRDT</CdtDbtInd>', Money::JPY(27)],
        ];
    }
}
