<?php

namespace Qafoo\Weather;

use Qafoo\Weather\Struct;

class Loader
{
    /**
     * List of weather services used for lookup
     *
     * @var \Qafoo\Weather\Service
     */
    protected $weatherService;

    /**
     * Logger used to log events
     *
     * @var \Qafoo\Weather\Logger
     */
    protected $logger;

    /**
     * Creates a new weather loader.
     *
     * The loader will per default use $weatherService to request weather data.
     * The optional $logger will log actions.
     *
     * @param \Qafoo\Weather\Service $weatherService
     * @param \Qafoo\Weather\Logger $logger
     */
    public function __construct(Service $weatherService, Logger $logger)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Add a fallback weather service
     *
     * @param \Qafoo\Weather\Service $weatherService
     * @return void
     */
    public function addFallbackService(Service $weatherService)
    {
    }

    /**
     * Get weather for single location
     *
     * Falls back to alternative weather services, if primary is not able to
     * provide weather data.
     *
     * @param \Struct\Location $location
     * @return \Struct\LocatedWeather
     */
    public function getWeatherForLocation(Struct\Location $location)
    {
        $weather = $this->weatherService->getWeatherForLocation($location);
        $result = new Struct\LocatedWeather();
        $result->location = $location;
        $result->weather = $weather;
        return $result;
    }
}

