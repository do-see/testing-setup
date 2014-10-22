<?php

namespace Qafoo\Weather\Struct;
use Qafoo\Weather\Struct;

class Weather extends Struct
{
    /**
     * Weather condition
     *
     * String describing the weather condition
     *
     * @var string
     */
    public $condition;

    /**
     * Temperature in celsius
     *
     * @var float
     */
    public $temperature;

    /**
     * Wind speed im km/h
     *
     * @var float
     */
    public $windSpeed;

    /**
     * Wind direction
     *
     * @var string
     */
    public $windDirection;

    /**
     * Construct from optional values
     *
     * @param string $condition
     * @param float $temperature
     * @param float $windSpeed
     * @param string $windDirection
     * @return void
     */
    public function __construct( $condition = null, $temperature = null, $windSpeed = null, $windDirection = null )
    {
        $this->condition     = $condition;
        $this->temperature   = $temperature;
        $this->windSpeed     = $windSpeed;
        $this->windDirection = $windDirection;
    }
}

