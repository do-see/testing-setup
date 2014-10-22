<?php

namespace Qafoo\Weather\Logger;
use Qafoo\Weather\Logger;

/**
 * Null-logger, ignoring all log messages
 */
class Null extends Logger
{
    /**
     * Log log message
     *
     * @param string $message
     * @return void
     */
    public function log( $message )
    {
        return;
    }
}

