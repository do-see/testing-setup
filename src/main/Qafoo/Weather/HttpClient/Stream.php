<?php

namespace Qafoo\Weather\HttpClient;
use Qafoo\Weather\HttpClient;

class Stream extends HttpClient
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
    public function request( $url, $method = 'GET', $headers = array() )
    {
        return file_get_contents(
            $url,
            false,
            stream_context_create( array(
                'http' => array(
                    'method' => $method,
                    'header' => implode( "\r\n", $headers ) . "\r\n",
                ),
            ) )
        );
    }
}

