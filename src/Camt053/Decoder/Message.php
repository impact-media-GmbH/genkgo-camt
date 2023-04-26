<?php

namespace Genkgo\Camt\Camt053\Decoder;

use Genkgo\Camt\Camt053\DTO as Camt053DTO;
use Genkgo\Camt\Decoder\Message as BaseMessageDecoder;
use Genkgo\Camt\DTO;
use Genkgo\Camt\Iban;
use SimpleXMLElement;

class Message extends BaseMessageDecoder
{
    /**
     * @param \Genkgo\Camt\DTO\Message $message
     * @param \SimpleXMLElement $document
     * @return void
     */
    public function addRecords($message, $document)
    {
        $statements = [];

        $xmlStatements = $this->getRootElement($document)->Stmt;
        foreach ($xmlStatements as $xmlStatement) {
            $statement = new Camt053DTO\Statement(
                (string) $xmlStatement->Id,
                $this->dateDecoder->decode((string) $xmlStatement->CreDtTm),
                $this->getAccount($xmlStatement)
            );

            if (isset($xmlStatement->StmtPgntn)) {
                $statement->setPagination(new DTO\Pagination(
                    (string) $xmlStatement->StmtPgntn->PgNb,
                    ('true' === (string) $xmlStatement->StmtPgntn->LastPgInd) ? true : false
                ));
            }

            if (isset($xmlStatement->AddtlStmtInf)) {
                $statement->setAdditionalInformation((string) $xmlStatement->AddtlStmtInf);
            }

            $this->addCommonRecordInformation($statement, $xmlStatement);
            $this->recordDecoder->addBalances($statement, $xmlStatement);
            $this->recordDecoder->addEntries($statement, $xmlStatement);

            $statements[] = $statement;
        }

        $message->setRecords($statements);
    }

    /**
     * @inheritDoc
     * @param \SimpleXMLElement $document
     * @return \SimpleXMLElement
     */
    public function getRootElement($document)
    {
        return $document->BkToCstmrStmt;
    }

    /**
     * @param \SimpleXMLElement $xmlRecord
     * @return \Genkgo\Camt\DTO\Account
     */
    protected function getAccount($xmlRecord)
    {
        if (isset($xmlRecord->Acct->Id->IBAN)) {
            return new DTO\IbanAccount(new Iban((string) $xmlRecord->Acct->Id->IBAN));
        }

        $xmlOtherIdentification = $xmlRecord->Acct->Id->Othr;
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
}
