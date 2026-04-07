<?php

namespace Toolbox\Api;

use GuzzleHttp\Client;
use Exception;

class CepService
{
    private $client;

    public function __construct()
    {
        // Base URL da API ViaCEP
        $this->client = new Client(['base_uri' => 'https://viacep.com.br/ws/']);
    }

    public function find(string $cep): array
    {
        // Sanitiza o CEP (remove traços e espaços)
        $cep = preg_replace('/[^0-9]/', '', $cep);

        if (strlen($cep) !== 8) {
            throw new Exception("CEP inválido. Deve conter 8 dígitos.");
        }

        $response = $this->client->request('GET', "{$cep}/json/");
        $data = json_decode($response->getBody(), true);

        if (isset($data['erro'])) {
            throw new Exception("CEP {$cep} não encontrado.");
        }

        return $data;
    }
}