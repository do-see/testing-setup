<?php

namespace Qafoo\Weather;
use Qafoo\Weather\Struct;

abstract class Service
{
    /**
     * Get weather for single location
     *
     * @param LocationStruct $location
     * @return WeatherStruct
     */
    abstract public function getWeatherForLocation( Struct\Location $location );
}

