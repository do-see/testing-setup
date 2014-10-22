<?php

namespace Qafoo\Weather;

abstract class HttpClient
{
    /**
     * Get response body for provided URL
     *
     * Defaults to a GET request. Additional request headers may be specified
     * using the $headers parameter.
     *
     * @throws HttpRequestException
     * @param string $url
     * @param string $method
     * @param array $headers
     * @return string
     */
    abstract public function request( $url, $method = 'GET', $headers = array() );
}

