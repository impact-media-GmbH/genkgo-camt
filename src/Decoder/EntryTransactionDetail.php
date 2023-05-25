<?php

namespace Genkgo\Camt\Decoder;

use Genkgo\Camt\Decoder\Factory\DTO as DTOFactory;
use Genkgo\Camt\DTO;
use Genkgo\Camt\DTO\RelatedParty;
use Genkgo\Camt\DTO\RelatedPartyTypeInterface;
use Genkgo\Camt\Util\MoneyFactory;
use SimpleXMLElement;

abstract class EntryTransactionDetail
{
    /**
     * @var \Genkgo\Camt\Decoder\DateDecoderInterface
     */
    private $dateDecoder;

    /**
     * @var \Genkgo\Camt\Util\MoneyFactory
     */
    private $moneyFactory;

    /**
     * EntryTransactionDetail constructor.
     */
    public function __construct(DateDecoderInterface $dateDecoder)
    {
        $this->dateDecoder = $dateDecoder;
        $this->moneyFactory = new MoneyFactory();
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $CdtDbtInd
     * @return void
     */
    public function addCreditDebitIdentifier($detail, $CdtDbtInd)
    {
        $creditDebitIdentifier = (string) $CdtDbtInd;
        $creditDebitIdentifier = in_array($creditDebitIdentifier, ['CRDT', 'DBIT'], true)
            ? $creditDebitIdentifier
            : null;
        $detail->setCreditDebitIndicator($creditDebitIdentifier);
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addReference($detail, $xmlDetail)
    {
        if (false === isset($xmlDetail->Refs)) {
            return;
        }

        $refs = $xmlDetail->Refs;
        $reference = new DTO\Reference();

        $reference->setMessageId(isset($refs->MsgId) ? (string) $refs->MsgId : null);
        $reference->setAccountServicerReference(isset($refs->AcctSvcrRef) ? (string) $refs->AcctSvcrRef : null);
        $reference->setPaymentInformationId(isset($refs->PmtInfId) ? (string) $refs->PmtInfId : null);
        $reference->setInstructionId(isset($refs->InstrId) ? (string) $refs->InstrId : null);
        $reference->setEndToEndId(isset($refs->EndToEndId) ? (string) $refs->EndToEndId : null);
        $reference->setUuidEndToEndReference(isset($refs->UETR) ? (string) $refs->UETR : null);
        $reference->setTransactionId(isset($refs->TxId) ? (string) $refs->TxId : null);
        $reference->setMandateId(isset($refs->MndtId) ? (string) $refs->MndtId : null);
        $reference->setChequeNumber(isset($refs->ChqNb) ? (string) $refs->ChqNb : null);
        $reference->setClearingSystemReference(isset($refs->ClrSysRef) ? (string) $refs->ClrSysRef : null);
        $reference->setAccountOwnerTransactionId(isset($refs->AcctOwnrTxId) ? (string) $refs->AcctOwnrTxId : null);
        $reference->setAccountServicerTransactionId(isset($refs->AcctSvcrTxId) ? (string) $refs->AcctSvcrTxId : null);
        $reference->setMarketInfrastructureTransactionId(isset($refs->MktInfrstrctrTxId) ? (string) $refs->MktInfrstrctrTxId : null);
        $reference->setProcessingId(isset($refs->PrcgId) ? (string) $refs->PrcgId : null);

        foreach ($refs->Prtry as $xmlProprietary) {
            $type = isset($xmlProprietary->Tp) ? (string) $xmlProprietary->Tp : null;
            $subReference = isset($xmlProprietary->Ref) ? (string) $xmlProprietary->Ref : null;

            $reference->addProprietary(new DTO\ProprietaryReference($type, $subReference));
        }

        $detail->setReference($reference);
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addRelatedParties($detail, $xmlDetail)
    {
        if (false === isset($xmlDetail->RltdPties)) {
            return;
        }

        /** @var SimpleXMLElement $xmlRelatedParty */
        foreach ($xmlDetail->RltdPties as $xmlRelatedParty) {
            if (isset($xmlRelatedParty->Cdtr)) {
                $xmlRelatedPartyType = $xmlRelatedParty->Cdtr;
                $xmlRelatedPartyTypeAccount = $xmlRelatedParty->CdtrAcct;

                $this->addRelatedParty($detail, $xmlRelatedPartyType, DTO\Creditor::class, $xmlRelatedPartyTypeAccount);
            }

            if (isset($xmlRelatedParty->UltmtCdtr)) {
                $xmlRelatedPartyType = $xmlRelatedParty->UltmtCdtr;

                $this->addRelatedParty($detail, $xmlRelatedPartyType, DTO\UltimateCreditor::class);
            }

            if (isset($xmlRelatedParty->Dbtr)) {
                $xmlRelatedPartyType = $xmlRelatedParty->Dbtr;
                $xmlRelatedPartyTypeAccount = $xmlRelatedParty->DbtrAcct;

                $this->addRelatedParty($detail, $xmlRelatedPartyType, DTO\Debtor::class, $xmlRelatedPartyTypeAccount);
            }

            if (isset($xmlRelatedParty->UltmtDbtr)) {
                $xmlRelatedPartyType = $xmlRelatedParty->UltmtDbtr;

                $this->addRelatedParty($detail, $xmlRelatedPartyType, DTO\UltimateDebtor::class);
            }
        }
    }

    /**
     * @param class-string<RelatedPartyTypeInterface> $relatedPartyTypeClass
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlRelatedPartyType
     * @param \SimpleXMLElement|null $xmlRelatedPartyTypeAccount
     * @return void
     */
    protected function addRelatedParty($detail, $xmlRelatedPartyType, $relatedPartyTypeClass, $xmlRelatedPartyTypeAccount = null)
    {
        // CAMT v08 uses substructure, so we check for its existence or fallback to the element itself to keep compatibility with CAMT v04
        $xmlPartyDetail = $xmlRelatedPartyType->Pty ?: (($xmlRelatedPartyTypeAgt = $xmlRelatedPartyType->Agt) ? $xmlRelatedPartyTypeAgt->FinInstnId : null) ?: $xmlRelatedPartyType;

        $xmlRelatedPartyName = (isset($xmlPartyDetail->Nm)) ? (string) $xmlPartyDetail->Nm : null;
        $relatedPartyType = new $relatedPartyTypeClass($xmlRelatedPartyName);

        if (isset($xmlPartyDetail->PstlAdr)) {
            $relatedPartyType->setAddress(DTOFactory\Address::createFromXml($xmlPartyDetail->PstlAdr));
        }

        $relatedParty = new RelatedParty($relatedPartyType, $this->getRelatedPartyAccount($xmlRelatedPartyTypeAccount));

        $detail->addRelatedParty($relatedParty);
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addRelatedAgents($detail, $xmlDetail)
    {
        if (false === isset($xmlDetail->RltdAgts)) {
            return;
        }

        foreach ($xmlDetail->RltdAgts as $xmlRelatedAgent) {
            if (isset($xmlRelatedAgent->CdtrAgt)) {
                $agent = new DTO\CreditorAgent((string) $xmlRelatedAgent->CdtrAgt->FinInstnId->Nm, (string) $xmlRelatedAgent->CdtrAgt->FinInstnId->BIC);
                $relatedAgent = new DTO\RelatedAgent($agent);
                $detail->addRelatedAgent($relatedAgent);
            }

            if (isset($xmlRelatedAgent->DbtrAgt)) {
                $agent = new DTO\DebtorAgent((string) $xmlRelatedAgent->DbtrAgt->FinInstnId->Nm, (string) $xmlRelatedAgent->DbtrAgt->FinInstnId->BIC);
                $relatedAgent = new DTO\RelatedAgent($agent);
                $detail->addRelatedAgent($relatedAgent);
            }
        }
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addRemittanceInformation($detail, $xmlDetail)
    {
        if (false === isset($xmlDetail->RmtInf)) {
            return;
        }

        $remittanceInformation = new DTO\RemittanceInformation();
        $unstructuredBlockExists = false;

        // Unstructured blocks
        $xmlDetailsUnstructuredBlocks = $xmlDetail->RmtInf->Ustrd;
        if ($xmlDetailsUnstructuredBlocks !== null) {
            foreach ($xmlDetailsUnstructuredBlocks as $xmlDetailsUnstructuredBlock) {
                $unstructuredRemittanceInformation = new DTO\UnstructuredRemittanceInformation(
                    (string) $xmlDetailsUnstructuredBlock
                );

                $remittanceInformation->addUnstructuredBlock($unstructuredRemittanceInformation);

                // Legacy : use the very first unstructured block
                if ($remittanceInformation->getMessage() === null) {
                    $unstructuredBlockExists = true;
                    $remittanceInformation->setMessage(
                        (string) $xmlDetailsUnstructuredBlock
                    );
                }
            }
        }

        // Strutcured blocks
        $xmlDetailsStructuredBlocks = $xmlDetail->RmtInf->Strd;
        if ($xmlDetailsStructuredBlocks !== null) {
            foreach ($xmlDetailsStructuredBlocks as $xmlDetailsStructuredBlock) {
                $structuredRemittanceInformation = new DTO\StructuredRemittanceInformation();

                if (isset($xmlDetailsStructuredBlock->AddtlRmtInf)) {
                    $structuredRemittanceInformation->setAdditionalRemittanceInformation(
                        (string) $xmlDetailsStructuredBlock->AddtlRmtInf
                    );
                }

                if (isset($xmlDetailsStructuredBlock->CdtrRefInf)) {
                    $creditorReferenceInformation = new DTO\CreditorReferenceInformation();

                    if (isset($xmlDetailsStructuredBlock->CdtrRefInf->Ref)) {
                        $creditorReferenceInformation->setRef(
                            (string) $xmlDetailsStructuredBlock->CdtrRefInf->Ref
                        );
                    }

                    if (isset($xmlDetailsStructuredBlock->CdtrRefInf->Tp, $xmlDetailsStructuredBlock->CdtrRefInf->Tp->CdOrPrtry, $xmlDetailsStructuredBlock->CdtrRefInf->Tp->CdOrPrtry->Prtry)

                    ) {
                        $creditorReferenceInformation->setProprietary(
                            (string) $xmlDetailsStructuredBlock->CdtrRefInf->Tp->CdOrPrtry->Prtry
                        );
                    }

                    if (isset($xmlDetailsStructuredBlock->CdtrRefInf->Tp, $xmlDetailsStructuredBlock->CdtrRefInf->Tp->CdOrPrtry, $xmlDetailsStructuredBlock->CdtrRefInf->Tp->CdOrPrtry->Cd)

                    ) {
                        $creditorReferenceInformation->setCode(
                            (string) $xmlDetailsStructuredBlock->CdtrRefInf->Tp->CdOrPrtry->Cd
                        );
                    }

                    $structuredRemittanceInformation->setCreditorReferenceInformation($creditorReferenceInformation);

                    // Legacy : do not overwrite message if already defined above
                    // and no creditor reference is already defined
                    if (false === $unstructuredBlockExists
                        && $remittanceInformation->getCreditorReferenceInformation() === null) {
                        $remittanceInformation->setCreditorReferenceInformation($creditorReferenceInformation);
                    }
                }

                $remittanceInformation->addStructuredBlock($structuredRemittanceInformation);
            }
        }

        $detail->setRemittanceInformation($remittanceInformation);
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addRelatedDates($detail, $xmlDetail)
    {
        if (false === isset($xmlDetail->RltdDts)) {
            return;
        }

        if (isset($xmlDetail->RltdDts->AccptncDtTm)) {
            $RelatedDates = DTO\RelatedDates::fromUnstructured(
                $this->dateDecoder->decode((string) $xmlDetail->RltdDts->AccptncDtTm)
            );
            $detail->setRelatedDates($RelatedDates);

            return;
        }
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addReturnInformation($detail, $xmlDetail)
    {
        if (isset($xmlDetail->RtrInf, $xmlDetail->RtrInf->Rsn->Cd)) {
            $remittanceInformation = DTO\ReturnInformation::fromUnstructured(
                (string) $xmlDetail->RtrInf->Rsn->Cd,
                (string) $xmlDetail->RtrInf->AddtlInf
            );
            $detail->setReturnInformation($remittanceInformation);
        }
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addAdditionalTransactionInformation($detail, $xmlDetail)
    {
        if (isset($xmlDetail->AddtlTxInf)) {
            $additionalInformation = new DTO\AdditionalTransactionInformation(
                (string) $xmlDetail->AddtlTxInf
            );
            $detail->setAdditionalTransactionInformation($additionalInformation);
        }
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addBankTransactionCode($detail, $xmlDetail)
    {
        $bankTransactionCode = new DTO\BankTransactionCode();

        if (isset($xmlDetail->BkTxCd)) {
            $bankTransactionCode = new DTO\BankTransactionCode();

            if (isset($xmlDetail->BkTxCd->Prtry)) {
                $proprietaryBankTransactionCode = new DTO\ProprietaryBankTransactionCode(
                    (string) $xmlDetail->BkTxCd->Prtry->Cd,
                    (string) $xmlDetail->BkTxCd->Prtry->Issr
                );

                $bankTransactionCode->setProprietary($proprietaryBankTransactionCode);
            }

            if (isset($xmlDetail->BkTxCd->Domn)) {
                $domainBankTransactionCode = new DTO\DomainBankTransactionCode(
                    (string) $xmlDetail->BkTxCd->Domn->Cd
                );

                if (isset($xmlDetail->BkTxCd->Domn->Fmly)) {
                    $domainFamilyBankTransactionCode = new DTO\DomainFamilyBankTransactionCode(
                        (string) $xmlDetail->BkTxCd->Domn->Fmly->Cd,
                        (string) $xmlDetail->BkTxCd->Domn->Fmly->SubFmlyCd
                    );

                    $domainBankTransactionCode->setFamily($domainFamilyBankTransactionCode);
                }

                $bankTransactionCode->setDomain($domainBankTransactionCode);
            }
        }

        $detail->setBankTransactionCode($bankTransactionCode);
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @return void
     */
    public function addCharges($detail, $xmlDetail)
    {
        if (isset($xmlDetail->Chrgs)) {
            $charges = new DTO\Charges();

            if (isset($xmlDetail->Chrgs->TtlChrgsAndTaxAmt) && (string) $xmlDetail->Chrgs->TtlChrgsAndTaxAmt) {
                $money = $this->moneyFactory->create($xmlDetail->Chrgs->TtlChrgsAndTaxAmt, null);

                $charges->setTotalChargesAndTaxAmount($money);
            }

            $chargesRecords = $xmlDetail->Chrgs->Rcrd;
            if ($chargesRecords !== null) {
                /** @var SimpleXMLElement $chargesRecord */
                foreach ($chargesRecords as $chargesRecord) {
                    $chargesDetail = new DTO\ChargesRecord();

                    if (isset($chargesRecord->Amt) && (string) $chargesRecord->Amt) {
                        $money = $this->moneyFactory->create($chargesRecord->Amt, $chargesRecord->CdtDbtInd);
                        $chargesDetail->setAmount($money);
                    }
                    if (isset($chargesRecord->CdtDbtInd) && (string) $chargesRecord->CdtDbtInd === 'true') {
                        $chargesDetail->setChargesIncludedIndicator(true);
                    }
                    if (isset($chargesRecord->Tp->Prtry->Id) && (string) $chargesRecord->Tp->Prtry->Id) {
                        $chargesDetail->setIdentification((string) $chargesRecord->Tp->Prtry->Id);
                    }
                    $charges->addRecord($chargesDetail);
                }
            }
            $detail->setCharges($charges);
        }
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @param \SimpleXMLElement $CdtDbtInd
     * @return void
     */
    public function addAmountDetails($detail, $xmlDetail, $CdtDbtInd)
    {
        if (isset($xmlDetail->AmtDtls, $xmlDetail->AmtDtls->TxAmt, $xmlDetail->AmtDtls->TxAmt->Amt)) {
            $money = $this->moneyFactory->create($xmlDetail->AmtDtls->TxAmt->Amt, $CdtDbtInd);
            $detail->setAmountDetails($money);
        }
    }

    /**
     * @param \Genkgo\Camt\DTO\EntryTransactionDetail $detail
     * @param \SimpleXMLElement $xmlDetail
     * @param \SimpleXMLElement $CdtDbtInd
     * @return void
     */
    public function addAmount($detail, $xmlDetail, $CdtDbtInd)
    {
        if (isset($xmlDetail->Amt)) {
            $money = $this->moneyFactory->create($xmlDetail->Amt, $CdtDbtInd);
            $detail->setAmount($money);
        }
    }

    /**
     * @param \SimpleXMLElement|null $xmlRelatedPartyTypeAccount
     * @return \Genkgo\Camt\DTO\Account|null
     */
    abstract public function getRelatedPartyAccount($xmlRelatedPartyTypeAccount);
}
