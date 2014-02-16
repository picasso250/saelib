<?php

include __DIR__.'/config.php';
include __DIR__.'/loadsae.php';

spl_autoload_register(function ($name) {
    if (preg_match('/^Sae([A-Z]\w+$)/', $name, $matches)) {
        $file = __DIR__.'/'.$matches[1].'.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

