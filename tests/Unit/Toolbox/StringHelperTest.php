<?php

namespace Toolbox\Tests;

use PHPUnit\Framework\TestCase;
use Toolbox\Utils\StringHelper;

class StringHelperTest extends TestCase
{
    public function test_deve_gerar_slug_corretamente()
    {
        $texto = "Aprender PHP é Legal";
        $esperado = "aprender-php-legal"; // Ajuste conforme sua lógica no StringHelper
        
        $resultado = StringHelper::slugify($texto);
        
        $this->assertEquals($esperado, $resultado);
    }
}