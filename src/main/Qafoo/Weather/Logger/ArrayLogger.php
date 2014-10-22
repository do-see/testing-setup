<?php

namespace Qafoo\Weather\Logger;

use Qafoo\Weather\Logger;

class ArrayLogger extends Logger
{
    /**
     * @var array<string>
     */
    private $logMessages = array();

    /**
     * Log log message
     *
     * @param string $message
     * @return void
     */
    public function log($message)
    {
        $this->logMessages[] = $message;
    }

    public function getLogMessages()
    {
        return $this->logMessages;
    }
}
