<?php

namespace Toolbox\Api;

use GuzzleHttp\Client;

class WeatherClient {
    private $client;
    private $apiKey;

    public function __construct(string $apiKey) {
        $this->client = new Client(['base_uri' => 'https://api.openweathermap.org/data/2.5/']);
        $this->apiKey = $apiKey;
    }

    public function getWeather(string $city): array {
        $response = $this->client->get('weather', [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}