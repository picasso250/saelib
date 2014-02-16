<?php

namespace saelib;

function db()
{
    static $db;
    if ($db !== null) {
        return $db;
    }

    $dsn = 'mysql:';
    $arr[] = 'host='.SAE_LIB_MYSQL_HOST;

    if (defined('SAE_LIB_MYSQL_PORT')) {
        $arr[] = 'port='.SAE_LIB_MYSQL_PORT;
    }

    if (defined('SAE_LIB_MYSQL_DB')) {
        $arr[] = 'dbname='.SAE_LIB_MYSQL_DB;
    } else {
        $arr[] = 'dbname=saelib';
    }

    $dsn .= implode(';', $arr);

    $username = defined('SAE_LIB_MYSQL_USER') ? SAE_LIB_MYSQL_USER : 'root';
    $password = defined('SAE_LIB_MYSQL_PASS') ? SAE_LIB_MYSQL_PASS : '';

    return $db = new Pdo($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
}
