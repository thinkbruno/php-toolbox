<?php

// "import" global
require_once __DIR__ . '/vendor/autoload.php';

use Toolbox\Utils\StringHelper;
use Toolbox\Api\WeatherClient;

echo "--- Testando StringHelper ---" . PHP_EOL;
echo "Slug: " . StringHelper::slugify("Meu Toolbox PHP") . PHP_EOL;

echo "\n--- Testando API (Guzzle) ---" . PHP_EOL;
// testar API (JSONPlaceholder)
$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');

$data = json_decode($response->getBody(), true);
echo "Título do Post 1: " . $data['title'] . PHP_EOL;