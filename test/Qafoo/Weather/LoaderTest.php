<?php

namespace Qafoo\Weather;

use Qafoo\Weather\Logger\ArrayLogger;
use Qafoo\Weather\Struct\Location;
use Qafoo\Weather\Struct\Weather;

class LoaderTest extends \PHPUnit_Framework_TestCase
{
    private $serviceMock;

    private $loader;

    public function setUp()
    {
        $this->serviceMock = $this->getMockBuilder('Qafoo\\Weather\\Service')
            ->disableOriginalConstructor()
            ->getMock();

        $this->loader = new Loader(
            $this->serviceMock,
            new ArrayLogger()
        );
    }

    public function testGetWeatherForLocationReturnsLocatedWeather()
    {
        $requestLocation = new Location('Holzkirchen');
        $weather = $this->loader->getWeatherForLocation($requestLocation);

        $this->assertInstanceOf('Qafoo\\Weather\\Struct\\LocatedWeather', $weather);
        $this->assertSame($requestLocation, $weather->location);
    }

    public function testGetWeatherForLocationAsksDefaultService()
    {
        $this->serviceMock->expects($this->once())
            ->method('getWeatherForLocation');

        $requestLocation = new Location('Holzkirchen');
        $this->loader->getWeatherForLocation($requestLocation);
    }

    public function testGetWeatherForLocationFromDefaultService()
    {
        $weather = new Weather();

        $this->serviceMock->expects($this->any())
            ->method('getWeatherForLocation')
            ->will($this->returnValue($weather));

        $requestLocation = new Location('Holzkirchen');
        $result = $this->loader->getWeatherForLocation($requestLocation);

        $this->assertSame($weather, $result->weather);
    }
}
