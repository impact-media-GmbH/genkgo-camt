<?php

namespace Genkgo\TestCamt\Unit\Camt054\Decoder;

use Genkgo\Camt\Camt054;
use Genkgo\Camt\Camt054\Decoder\Message;
use Genkgo\Camt\Decoder as DecoderObject;
use Genkgo\Camt\DTO;
use PHPUnit\Framework;
use SimpleXMLElement;

class MessageTest extends Framework\TestCase
{
    /**
     * @var DecoderObject\Record&Framework\MockObject\MockObject
     */
    private $mockedRecordDecoder;

    /**
     * @var \Genkgo\Camt\Camt054\Decoder\Message
     */
    private $decoder;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->mockedRecordDecoder = $this->createMock(DecoderObject\Record::class);
        $this->decoder = new Message($this->mockedRecordDecoder, new DecoderObject\Date());
    }

    /**
     * @return void
     */
    public function testItAddsGroupHeader()
    {
        $message = $this->createMock(DTO\Message::class);

        $message
            ->expects(self::once())
            ->method('setGroupHeader')
            ->with(self::isInstanceOf(DTO\GroupHeader::class));

        $this->decoder->addGroupHeader($message, $this->getXmlMessage());
    }

    /**
     * @return void
     */
    public function testItAddsNotifications()
    {
        $message = $this->createMock(DTO\Message::class);

        $this->mockedRecordDecoder
            ->expects(self::once())
            ->method('addEntries')->with(self::isInstanceOf(Camt054\DTO\Notification::class), self::isInstanceOf(SimpleXMLElement::class));

        $message
            ->expects(self::once())
            ->method('setRecords')
            ->with(self::callback(static function (array $records) {
                self::assertContainsOnlyInstancesOf(Camt054\DTO\Notification::class, $records);
                self::assertCount(1, $records);

                return true;
            }));

        $this->decoder->addRecords($message, $this->getXmlMessage());
    }

    /**
     * @return \SimpleXMLElement
     */
    private function getXmlMessage()
    {
        $xmlContent = <<<XML
<content>
    <BkToCstmrDbtCdtNtfctn>
        <GrpHdr>
            <MsgId>CAMT053RIB000000000001</MsgId>
            <CreDtTm>2015-03-10T18:43:50+00:00</CreDtTm>
        </GrpHdr>
        <Ntfctn>
            <Id>253EURNL26VAYB8060476890</Id>
            <CreDtTm>2015-03-10T18:43:50+00:00</CreDtTm>
            <Acct>
                <Id>
                    <PrtryAcct>
                        <Id>50000000054910000003</Id>
                    </PrtryAcct>
                </Id>
            </Acct>
        </Ntfctn>
    </BkToCstmrDbtCdtNtfctn>
</content>
XML;

        return new SimpleXMLElement($xmlContent);
    }
}
