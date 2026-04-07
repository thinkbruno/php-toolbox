<?php

use PHPUnit\Framework\TestCase;
use Toolbox\Utils\StringHelper;

class StringHelperTest extends TestCase {
    public function testSlugifyConvertsTextCorrectly() {
        $result = StringHelper::slugify("Olá Mundo PHP");
        $this->assertEquals("ol-mundo-php", $result);
    }
}