<?php

namespace Qafoo\Weather\Struct;
use Qafoo\Weather\Struct;

class LocatedWeather extends Struct
{
    /**
     * Date
     *
     * @var \DateTime
     */
    public $date;

    /**
     * Location
     *
     * @var \Qafoo\Weather\Struct\Location
     */
    public $location;

    /**
     * Weather
     *
     * @var \Qafoo\Weather\Struct\Weather
     */
    public $weather;

    /**
     * Construct from optional values
     *
     * @param \DateTime $date
     * @param \Qafoo\Weather\Struct\Location $location
     * @param \Qafoo\Weather\Struct\Weather $weather
     * @return void
     */
    public function __construct( \DateTime $date = null, Location $location = null, Weather $weather = null )
    {
        $this->date     = $date;
        $this->location = $location;
        $this->weather  = $weather;
    }
}

