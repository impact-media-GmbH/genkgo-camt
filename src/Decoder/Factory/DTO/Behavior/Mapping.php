<?php

namespace Genkgo\Camt\Decoder\Factory\DTO\Behavior;

use SimpleXMLElement;

trait Mapping
{
    /**
     * @param string[][] $mapping
     * @param object $object
     * @param \SimpleXMLElement $xml
     * @return void
     */
    public static function map($object, $xml, $mapping)
    {
        foreach ($mapping as $line) {
            $setter = $line['setter'];
            $xmlValue = $line['value'];

            if (isset($xml->$xmlValue)) {
                $object->$setter((string) $xml->$xmlValue);
            }
        }
    }
}
