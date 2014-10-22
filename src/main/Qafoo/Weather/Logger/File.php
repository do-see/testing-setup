<?php

namespace Qafoo\Weather\Logger;
use Qafoo\Weather\Logger;

/**
 * Logs log messages to a file
 */
class File extends Logger
{
    /**
     * Name of file to log to
     *
     * @var string
     */
    protected $file;

    /**
     * Construct from file name
     *
     * @param string $file
     * @return void
     */
    public function __construct( $file )
    {
        $this->file = $file;
    }

    /**
     * Log log message
     *
     * @param string $message
     * @return void
     */
    public function log( $message )
    {
        $fp = fopen( $this->file, 'a' );
        fwrite( $fp, trim( $message ) . "\n" );
        fclose( $fp );
    }
}

