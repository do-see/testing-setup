<?php

namespace Qafoo\Weather\Service;
use Qafoo\Weather\Service;

use Qafoo\Weather\HttpClient;
use Qafoo\Weather\Struct;

class Google extends Service
{
    /**
     * HTTP clienclient
     *
     * @var \Qafoo\Weather\HttpClient
     */
    protected $httpClient;

    /**
     * Construct on basis of $httpClient
     *
     * @param \Qafoo\Weather\HttpClient $httpClient
     * @return void
     */
    public function __construct( HttpClient $httpClient )
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Converts a distance provided in miles to kilometers
     *
     * @param float $miles
     * @return float
     */
    protected function convertMilesToKilometer( $miles )
    {
        return $miles * 1.609344;
    }

    /**
     * Fetch weather for location from Google service
     *
     * @param Struct\Location $location
     * @return void
     */
    protected function fetchData( Struct\Location $location )
    {
        return $this->httpClient->request(
            "http://www.google.com/ig/api?" .
            http_build_query(
                array(
                    'weather' => $location->city . ', ' . $location->country,
                    'hl' => 'en',
                    'ie' => 'utf-8',
                    'oe' => 'utf-8',
                )
            )
        );
    }

    /**
     * Get weather for single location
     *
     * @param Struct\Location $location
     * @return \Qafoo\Weather\Struct\Weather
     */
    public function getWeatherForLocation( Struct\Location $location )
    {
        $weatherData = new Struct\Weather();

        $xml = $this->fetchData( $location );

        $doc = new \DOMDocument();
        $doc->loadXml( $xml );

        $xpath = new \DOMXPath( $doc );

        $currentConditions = $xpath->query(
            '/xml_api_reply/weather/current_conditions'
        )->item(0);

        $weatherData->condition = $xpath->evaluate(
            './condition/@data',
            $currentConditions
        )->item( 0 )->value;

        $weatherData->temperature = (float) $xpath->evaluate(
            './temp_c/@data',
            $currentConditions
        )->item( 0 )->value;

        $wind = $xpath->evaluate(
            './wind_condition/@data',
            $currentConditions
        )->item( 0 )->value;

        if ( preg_match( '(Wind:\\s+(?P<direction>[SWNE]+)\\s+at\\s+(?P<speed>\\d+))', $wind, $matches ) )
        {
            $weatherData->windSpeed     = $this->convertMilesToKilometer( $matches['speed'] );
            $weatherData->windDirection = $matches['direction'];
        }

        return $weatherData;
    }
}

