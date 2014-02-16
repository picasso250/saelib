<?php

include __DIR__.'/loadsae.php';

if (!defined('REDIS_HOST')) {
    define('REDIS_HOST', '127.0.0.1');
}
if (!defined('REDIS_PORT')) {
    define('REDIS_PORT', '6379');
}

include __DIR__.'/TmpFs.php';
include __DIR__.'/XHProf.php';

spl_autoload_register(function ($name) {
    if (preg_match('/^Sae([A-Z]\w+$)/', $name, $matches)) {
        $file = __DIR__.'/'.$matches[1].'.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

