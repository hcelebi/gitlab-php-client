<?php

namespace Client\Factory;

use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

class GitLabClientFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'base_uri' => 'https://gitlab.com/api/v4/',
            'curl' => [
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_VERBOSE => false,
                CURLOPT_ENCODING => ''
            ],
            'verify' => false,
            "debug" => true
        ]);
        $container[self::class] = $client;
    }
}