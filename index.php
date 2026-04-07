<?php

// "import" global
require_once __DIR__ . '/vendor/autoload.php';

use Toolbox\Utils\StringHelper;
use Toolbox\Api\WeatherClient;
use Toolbox\Api\CepService;
use Toolbox\Utils\UptimeChecker;

$uptime = new UptimeChecker();
$service = new CepService();

echo "--- Testando UptimeChecker ---" . PHP_EOL;
$sites = [
    'https://www.google.com',
    'https://github.com',
    'https://um-site-que-nao-existe-123.com'
];

echo "\n--- Verificador de Uptime ---\n";

foreach ($sites as $site) {
    $result = $uptime->check($site);
    printf(
        "[%s] %s - %d (%s ms)\n",
        strtoupper($result['status']),
        $result['url'],
        $result['code'],
        $result['response_time_ms'] ?? 'N/A'
    );
}

echo "--- --------------------- ---" . PHP_EOL;

echo "--- Testando CepService ---" . PHP_EOL;
try {
    echo "Buscando CEP... \n";
    $endereco = $service->find('01001000'); // CEP da Praça da Sé
    
    echo "Logradouro: " . $endereco['logradouro'] . PHP_EOL;
    echo "Bairro: " . $endereco['bairro'] . PHP_EOL;
    echo "Cidade: " . $endereco['localidade'] . "/" . $endereco['uf'] . PHP_EOL;
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo "--- --------------------- ---" . PHP_EOL;


echo "--- Testando StringHelper ---" . PHP_EOL;
echo "Slug: " . StringHelper::slugify("Meu Toolbox PHP") . PHP_EOL;

echo "\n--- Testando API (Guzzle) ---" . PHP_EOL;
// testar API (JSONPlaceholder)
$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');

$data = json_decode($response->getBody(), true);
echo "Título do Post 1: " . $data['title'] . PHP_EOL;