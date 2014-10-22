<?php

namespace Qafoo\Weather\Logger;

class ArrayLoggerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Qafoo\Weather\Logger\ArrayLogger
     */
    private $logger;

    public function setUp()
    {
        $this->logger = new ArrayLogger();
    }

    public function testLogSingleMessage()
    {
        $this->logger->log('Test Message');

        $actualResult = $this->logger->getLogMessages();

        $this->assertEquals(
            array('Test Message'),
            $actualResult
        );
    }

    public function testLogAnotherSingleMessage()
    {
        $this->logger->log('Zauberponyland');

        $actualResult = $this->logger->getLogMessages();

        $this->assertEquals(
            array('Zauberponyland'),
            $actualResult
        );
    }

    public function testLogMultipleMessages()
    {
        $this->logger->log('Zauberponyland');
        $this->logger->log('Pink fluffy unicorn');

        $actualResult = $this->logger->getLogMessages();

        $this->assertEquals(
            array('Zauberponyland', 'Pink fluffy unicorn'),
            $actualResult
        );
    }
}
