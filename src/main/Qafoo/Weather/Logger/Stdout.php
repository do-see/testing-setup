<?php

namespace Qafoo\Weather\Logger;
use Qafoo\Weather\Logger;

/**
 * Logs log messages to STDOUT
 */
class Stdout extends Logger
{
    /**
     * Log a message
     *
     * @param string $message
     * @return void
     */
    public function log( $message )
    {
        echo $message;
    }
}

