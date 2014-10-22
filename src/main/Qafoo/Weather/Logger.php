<?php

namespace Qafoo\Weather;

/**
 * Abstract logger base class
 */
abstract class Logger
{
    /**
     * Log log message
     *
     * @param string $message
     * @return void
     */
    abstract public function log($message);
}

