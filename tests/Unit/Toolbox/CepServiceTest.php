<?php

namespace Toolbox\Tests;

use PHPUnit\Framework\TestCase;
use Toolbox\Api\CepService;

class CepServiceTest extends TestCase
{
    public function test_deve_retornar_endereco_valido()
    {
        $service = new CepService();
        $resultado = $service->find('01001000');

        $this->assertArrayHasKey('logradouro', $resultado);
        $this->assertEquals('Praça da Sé', $resultado['logradouro']);
    }

    public function test_deve_lancar_excecao_para_cep_curto()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("CEP inválido");

        $service = new CepService();
        $service->find('123');
    }
}