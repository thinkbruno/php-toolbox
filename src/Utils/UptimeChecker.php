<?php

namespace Toolbox\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;

class UptimeChecker
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'timeout' => 5.0, // Não espera mais que 5 segundos
            'http_errors' => false, // Não trava se der erro 4xx ou 5xx
        ]);
    }

    public function check(string $url): array
    {
        $responseTime = 0;

        try {
            $response = $this->client->request('GET', $url, [
                'on_stats' => function (TransferStats $stats) use (&$responseTime) {
                    $responseTime = $stats->getTransferTime() * 1000; // Converte para milissegundos
                }
            ]);

            $statusCode = $response->getStatusCode();

            return [
                'url' => $url,
                'status' => ($statusCode >= 200 && $statusCode < 300) ? 'online' : 'offline',
                'code' => $statusCode,
                'response_time_ms' => round($responseTime, 2)
            ];
        } catch (\Exception $e) {
            return [
                'url' => $url,
                'status' => 'offline',
                'code' => 0,
                'error' => $e->getMessage()
            ];
        }
    }
}