<?php

namespace Toolbox\Utils;

class StringHelper {
    public static function slugify(string $text): string {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    }
}
