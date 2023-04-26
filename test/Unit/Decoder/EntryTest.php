<?php

namespace Genkgo\TestCamt\Unit\Decoder;

use Genkgo\Camt\Decoder;
use Genkgo\Camt\Decoder\Entry;
use Genkgo\Camt\DTO;
use PHPUnit\Framework;
use SimpleXMLElement;

class EntryTest extends Framework\TestCase
{
    /**
     * @var Decoder\EntryTransactionDetail&Framework\MockObject\MockObject
     */
    private $mockedEntryTransactionDetailDecoder;

    /**
     * @var \Genkgo\Camt\Decoder\Entry
     */
    private $decoder;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->mockedEntryTransactionDetailDecoder = $this->createMock(Decoder\EntryTransactionDetail::class);
        $this->decoder = new Entry($this->mockedEntryTransactionDetailDecoder);
    }

    /**
     * @return void
     */
    public function testItDoesNotAddTransactionDetailsIfThereIsNoneInXml()
    {
        $entry = $this->createMock(DTO\Entry::class);

        $entry
            ->expects(self::never())
            ->method('addTransactionDetail')
            ->with(self::anything());

        $xmlEntry = new SimpleXMLElement('<content></content>');
        $this->decoder->addTransactionDetails($entry, $xmlEntry);
    }

    /**
     * @return void
     */
    public function testItAddsTransactionDetailsIfThereArePresentInXml()
    {
        $entry = $this->createMock(DTO\Entry::class);

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addReference')
            ->with(
                self::isInstanceOf(DTO\EntryTransactionDetail::class),
                self::isInstanceOf(SimpleXMLElement::class)
            );

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addRelatedParties')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addRelatedAgents')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addRemittanceInformation')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addRelatedDates')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addReturnInformation')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addAdditionalTransactionInformation')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addBankTransactionCode')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addCharges')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addAmountDetails')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class));

        $this->mockedEntryTransactionDetailDecoder
            ->expects(self::once())
            ->method('addAmount')->with(self::isInstanceOf(DTO\EntryTransactionDetail::class), self::isInstanceOf(SimpleXMLElement::class), self::isInstanceOf(SimpleXMLElement::class));

        $entry
            ->expects(self::once())
            ->method('addTransactionDetail')
            ->with(self::isInstanceOf(DTO\EntryTransactionDetail::class));

        $this->decoder->addTransactionDetails($entry, $this->getXmlEntry());
    }

    /**
     * @return \SimpleXMLElement
     */
    private function getXmlEntry()
    {
        $xmlContent = <<<XML
<content>
    <NtryDtls>
        <TxDtls>
            <EndToEndId>000000001</EndToEndId>
        </TxDtls>
    </NtryDtls>
</content>
XML;

        return new SimpleXMLElement($xmlContent);
    }
}
