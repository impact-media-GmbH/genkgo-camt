<?php

namespace Genkgo\TestCamt\Unit\Decoder;

use Genkgo\Camt\Camt053;
use Genkgo\Camt\Decoder\Date;
use Genkgo\Camt\DTO;
use Money\Money;
use PHPUnit\Framework;
use SimpleXMLElement;

class EntryTransactionDetailTest extends Framework\TestCase
{
    /**
     * @return void
     */
    public function testItDoesNotAddReferenceIfThereIsNoneInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::never())
            ->method('setReference')
            ->with(self::anything());

        $xmlDetail = new SimpleXMLElement('<content></content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addReference($detail, $xmlDetail);
    }

    /**
     * @return void
     */
    public function testItAddsReferenceIfItIsPresentInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setReference')
            ->with(self::isInstanceOf(DTO\Reference::class));

        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addReference($detail, $this->getXmlDetail());
    }

    /**
     * @return void
     */
    public function testItDoesNotAddAdditionalTransactionInformationIfThereIsNoneInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::never())
            ->method('setAdditionalTransactionInformation')
            ->with(self::anything());

        $xmlDetail = new SimpleXMLElement('<content></content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addAdditionalTransactionInformation($detail, $xmlDetail);
    }

    /**
     * @return void
     */
    public function testItAddsAdditionalTransactionInformationIfItIsPresentInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setAdditionalTransactionInformation')
            ->with(self::isInstanceOf(DTO\AdditionalTransactionInformation::class));

        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addAdditionalTransactionInformation($detail, $this->getXmlDetail());
    }

    /**
     * @return void
     */
    public function testItDoesNotAddRemittanceInformationIfThereIsNoneInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::never())
            ->method('setRemittanceInformation')
            ->with(self::anything());

        $xmlDetail = new SimpleXMLElement('<content></content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addRemittanceInformation($detail, $xmlDetail);
    }

    /**
     * @return void
     */
    public function testItAddsRemittanceInformationAndCreditorReferenceIfItIsPresentInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setRemittanceInformation')
            ->with(self::isInstanceOf(DTO\RemittanceInformation::class));

        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addRemittanceInformation($detail, $this->getXmlDetail());
    }

    /**
     * @return void
     */
    public function testItAddsRemittanceInformationIfItIsPresentInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setRemittanceInformation')
            ->with(self::isInstanceOf(DTO\RemittanceInformation::class));

        $xmlDetail = new SimpleXMLElement('<content><RmtInf><Ustrd>Lorem</Ustrd></RmtInf></content>');

        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addRemittanceInformation($detail, $xmlDetail);
    }

    /**
     * @return void
     */
    public function testItDoesNotAddReturnInformationIfThereIsNoneInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::never())
            ->method('setReturnInformation')
            ->with(self::anything());

        $xmlDetail = new SimpleXMLElement('<content></content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addReturnInformation($detail, $xmlDetail);
    }

    /**
     * @return void
     */
    public function testItAddsReturnInformationIfItIsPresentInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setReturnInformation')
            ->with(self::isInstanceOf(DTO\ReturnInformation::class));

        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addReturnInformation($detail, $this->getXmlDetail());
    }

    /**
     * @return void
     */
    public function testItDoesNotAddRelatedPartiesIfThereIsNoneInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::never())
            ->method('addRelatedParty')
            ->with(self::anything());

        $xmlDetail = new SimpleXMLElement('<content></content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addRelatedParties($detail, $xmlDetail);
    }

    /**
     * @return void
     */
    public function testItAddsRelatedPartiesIfIsPresentInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('addRelatedParty')
            ->with(self::isInstanceOf(DTO\RelatedParty::class));

        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addRelatedParties($detail, $this->getXmlDetail());
    }

    /**
     * @return void
     */
    public function testItDoesNotAddRelatedDatesIfThereIsNoneInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::never())
            ->method('setRelatedDates')
            ->with(self::anything());

        $xmlDetail = new SimpleXMLElement('<content></content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addRelatedDates($detail, $xmlDetail);
    }

    /**
     * @return void
     */
    public function testItAddsRelatedDatesIfIsPresentInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setRelatedDates')
            ->with(self::isInstanceOf(DTO\RelatedDates::class));

        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addRelatedDates($detail, $this->getXmlDetail());
    }

    /**
     * @return void
     */
    public function testItDoesNotAddChargesIfThereIsNoneInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::never())
            ->method('setCharges')
            ->with(self::anything());

        $xmlDetail = new SimpleXMLElement('<content></content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addCharges($detail, $xmlDetail);
    }

    /**
     * @return void
     */
    public function testItAddsChargesIfIsPresentInXml()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setCharges')
            ->with(self::isInstanceOf(DTO\Charges::class));

        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addCharges($detail, $this->getXmlDetail());
    }

    /**
     * @return void
     */
    public function testItAddsAmountDetailsIfIsPresentInXmsl()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setAmountDetails')
            ->with(self::isInstanceOf(Money::class));

        $CdtDbtInd = new SimpleXMLElement('<content>DBIT</content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addAmountDetails($detail, $this->getXmlDetail(), $CdtDbtInd);
    }

    /**
     * @return void
     */
    public function testItAddsAmountIfIsPresentInXmsl()
    {
        $detail = $this->createMock(DTO\EntryTransactionDetail::class);

        $detail
            ->expects(self::once())
            ->method('setAmount')
            ->with(self::isInstanceOf(Money::class));

        $CdtDbtInd = new SimpleXMLElement('<content>DBIT</content>');
        (new Camt053\Decoder\EntryTransactionDetail(new Date()))->addAmount($detail, $this->getXmlDetail(), $CdtDbtInd);
    }

    /**
     * @return \SimpleXMLElement
     */
    private function getXmlDetail()
    {
        $xmlContent = <<<XML
<content>
    <Refs>
        <EndToEndId>some end to end id</EndToEndId>
        <MndtId>some mandate id</MndtId>
    </Refs>
    <AddtlTxInf>additional transaction information</AddtlTxInf>
    <RtrInf>
        <Rsn>
            <Cd>lorem</Cd>
        </Rsn>
        <AddtlInf>ipsum</AddtlInf>
    </RtrInf>
    <RmtInf>
        <Strd>
            <CdtrRefInf>
                <Ref>Some reference</Ref>
            </CdtrRefInf>
            <Cd>lorem</Cd>
        </Strd>
    </RmtInf>
    <RltdDts>
      <AccptncDtTm>2017-02-27T15:23:45.446</AccptncDtTm>
    </RltdDts>
    <Chrgs>
      <TtlChrgsAndTaxAmt Ccy="CHF">1.79</TtlChrgsAndTaxAmt>
      <Rcrd>
        <Amt Ccy="CHF">1.75</Amt>
        <CdtDbtInd>DBIT</CdtDbtInd>
        <ChrgInclInd>false</ChrgInclInd>
        <Tp>
          <Prtry>
            <Id>2</Id>
          </Prtry>
        </Tp>
      </Rcrd>
      <Rcrd>
        <Amt Ccy="CHF">0.04</Amt>
        <CdtDbtInd>DBIT</CdtDbtInd>
        <ChrgInclInd>false</ChrgInclInd>
        <Tp>
          <Prtry>
            <Id>4</Id>
          </Prtry>
        </Tp>
      </Rcrd>
    </Chrgs>    
    <RltdPties>
        <Cdtr>
            <Nm>Lorem</Nm>
            <PstlAdr>
                <Ctry>NL</Ctry>
                <AdrLine>NL</AdrLine>
            </PstlAdr>
        </Cdtr>
        <CdtrAcct>
            <Id>
                <IBAN>NL39ULSS6234823955</IBAN>
            </Id>
        </CdtrAcct>
    </RltdPties>
    <AmtDtls>
      <TxAmt>
        <Amt Ccy="CHF">3.1</Amt>
      </TxAmt>
    </AmtDtls>
    <Amt Ccy="JPY">27</Amt>
</content>
XML;

        return new SimpleXMLElement($xmlContent);
    }
}
