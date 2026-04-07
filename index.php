<?php


require_once __DIR__ . '/vendor/autoload.php';

use Toolbox\Utils\StringHelper;
use Toolbox\Api\WeatherClient;

// Testando o Utilitário
$slug = StringHelper::slugify("Criando meu Toolbox em PHP");
echo "Slug: " . $slug . PHP_EOL;

// Testando a API (Exemplo com chave fictícia)
$weather = new WeatherClient('SUA_API_KEY_AQUI');
// $dados = $weather->getWeather('Sao Paulo');
// print_r($dados);