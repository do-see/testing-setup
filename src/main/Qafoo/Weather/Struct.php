<?php

namespace Qafoo\Weather;

abstract class Struct
{
    /**
     * Throw an exception on unavailable properties.
     *
     * @param string $property
     * @return void
     */
    public function __get( $property )
    {
        throw new RuntimeException( 'Trying to get non-existing property ' . $property );
    }

    /**
     * Throw an exception on unavailable properties.
     *
     * @param string $property
     * @param mixed $value
     * @return void
     */
    public function __set( $property, $value )
    {
        throw new RuntimeException( 'Trying to set non-existing property ' . $property );
    }

    /**
     * Perform a deep cloning operation
     *
     * @return void
     */
    public function __clone()
    {
        foreach ( $this as $property => $value )
        {
            if ( is_object( $value ) )
            {
                $this->$property = clone $value;
            }
        }
    }
}

