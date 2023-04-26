<?php

namespace Genkgo\Camt\DTO;

use Genkgo\Camt\Iterator\EntryIterator;

class Message
{
    /**
     * @var \Genkgo\Camt\DTO\GroupHeader
     */
    private $groupHeader;

    /**
     * @var Record[]
     */
    private $records = [];

    /**
     * @return \Genkgo\Camt\DTO\GroupHeader
     */
    public function getGroupHeader()
    {
        return $this->groupHeader;
    }

    /**
     * @param \Genkgo\Camt\DTO\GroupHeader $groupHeader
     * @return void
     */
    public function setGroupHeader($groupHeader)
    {
        $this->groupHeader = $groupHeader;
    }

    /**
     * @return Record[]
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * @param Record[] $records
     * @return void
     */
    public function setRecords($records)
    {
        $this->records = $records;
    }

    /**
     * @return Entry[]|EntryIterator
     */
    public function getEntries()
    {
        return new EntryIterator($this);
    }
}
