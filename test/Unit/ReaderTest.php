<?php

namespace Genkgo\TestCamt\Unit;

use DOMDocument;
use Genkgo\Camt\Camt053\MessageFormat;
use Genkgo\Camt\Config;
use Genkgo\Camt\DTO;
use Genkgo\Camt\Exception\ReaderException;
use Genkgo\Camt\Reader;
use PHPUnit\Framework;

class ReaderTest extends Framework\TestCase
{
    /**
     * @return \Genkgo\Camt\Config
     */
    protected function getDefaultConfig()
    {
        $config = new Config();
        $config->addMessageFormat(new MessageFormat\V02());

        return $config;
    }

    /**
     * @return void
     */
    public function testReadEmptyDocument()
    {
        $this->expectException(ReaderException::class);
        $reader = new Reader($this->getDefaultConfig());
        $reader->readDom(new DOMDocument('1.0', 'UTF-8'));
    }

    /**
     * @return void
     */
    public function testReadWrongFormat()
    {
        $this->expectException(ReaderException::class);

        $dom = new DOMDocument('1.0', 'UTF-8');
        $root = $dom->createElement('Document');
        $root->setAttribute('xmlns', 'unknown');
        $dom->appendChild($root);

        $reader = new Reader($this->getDefaultConfig());
        $reader->readDom($dom);
    }

    /**
     * @return void
     */
    public function testReadFile()
    {
        $reader = new Reader(Config::getDefault());
        $message = $reader->readFile('test/data/camt053.v2.minimal.xml');
        self::assertInstanceOf(DTO\Message::class, $message);
    }

    /**
     * @return void
     */
    public function testReadFileWithNoXsdValidation()
    {
        $config = Config::getDefault();
        $config->disableXsdValidation();

        $reader = new Reader($config);
        $message = $reader->readFile('test/data/camt053.v2.minimal.xml');
        self::assertInstanceOf(DTO\Message::class, $message);
    }
}
