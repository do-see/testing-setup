<?php

namespace Qafoo\Weather\Struct;
use Qafoo\Weather\Struct;

class Location extends Struct
{
    /**
     * City
     *
     * @var string
     */
    public $city;

    /**
     * Country
     *
     * @var string
     */
    public $country;

    /**
     * Construct from optional city and country
     *
     * @param string $city
     * @param string $country
     * @return void
     */
    public function __construct( $city = null, $country = null )
    {
        $this->city    = $city;
        $this->country = $country;
    }
}

