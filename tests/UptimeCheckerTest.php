<?php

namespace Toolbox\Tests;

use PHPUnit\Framework\TestCase;
use Toolbox\Utils\UptimeChecker;

class UptimeCheckerTest extends TestCase
{
    public function test_deve_identificar_site_online()
    {
        $checker = new UptimeChecker();
        $result = $checker->check('https://www.google.com');

        $this->assertEquals('online', $result['status']);
        $this->assertGreaterThan(0, $result['response_time_ms']);
    }

    public function test_deve_identificar_site_inexistente_como_offline()
    {
        $checker = new UptimeChecker();
        $result = $checker->check('https://site-que-nao-existe-mesmo.xyz');

        $this->assertEquals('offline', $result['status']);
        $this->assertEquals(0, $result['code']);
    }
}