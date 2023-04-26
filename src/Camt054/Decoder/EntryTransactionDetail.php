<?php

namespace Genkgo\Camt\Camt054\Decoder;

use Genkgo\Camt\Decoder\EntryTransactionDetail as BaseDecoder;
use Genkgo\Camt\DTO;
use Genkgo\Camt\Iban;
use SimpleXMLElement;

class EntryTransactionDetail extends BaseDecoder
{
    /**
     * @inheritDoc
     * @param \SimpleXMLElement|null $xmlRelatedPartyTypeAccount
     * @return \Genkgo\Camt\DTO\Account|null
     */
    public function getRelatedPartyAccount($xmlRelatedPartyTypeAccount)
    {
        if (!$xmlRelatedPartyTypeAccount) {
            return null;
        }

        if (false === isset($xmlRelatedPartyTypeAccount->Id)) {
            return null;
        }

        if (isset($xmlRelatedPartyTypeAccount->Id->IBAN)) {
            return new DTO\IbanAccount(new Iban((string) $xmlRelatedPartyTypeAccount->Id->IBAN));
        }

        if (isset($xmlRelatedPartyTypeAccount->Id->BBAN)) {
            return new DTO\BBANAccount((string) $xmlRelatedPartyTypeAccount->Id->BBAN);
        }

        if (isset($xmlRelatedPartyTypeAccount->Id->UPIC)) {
            return new DTO\UPICAccount((string) $xmlRelatedPartyTypeAccount->Id->UPIC);
        }

        if (isset($xmlRelatedPartyTypeAccount->Id->PrtryAcct)) {
            return new DTO\ProprietaryAccount((string) $xmlRelatedPartyTypeAccount->Id->PrtryAcct->Id);
        }

        if (isset($xmlRelatedPartyTypeAccount->Id->Othr)) {
            $xmlOtherIdentification = $xmlRelatedPartyTypeAccount->Id->Othr;
            $otherAccount = new DTO\OtherAccount((string) $xmlOtherIdentification->Id);

            if (isset($xmlOtherIdentification->SchmeNm)) {
                if (isset($xmlOtherIdentification->SchmeNm->Cd)) {
                    $otherAccount->setSchemeName((string) $xmlOtherIdentification->SchmeNm->Cd);
                }

                if (isset($xmlOtherIdentification->SchmeNm->Prtry)) {
                    $otherAccount->setSchemeName((string) $xmlOtherIdentification->SchmeNm->Prtry);
                }
            }

            if (isset($xmlOtherIdentification->Issr)) {
                $otherAccount->setIssuer((string) $xmlOtherIdentification->Issr);
            }

            return $otherAccount;
        }

        return null;
    }
}
