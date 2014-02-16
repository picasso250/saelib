<?php

require_once __DIR__.'/db.php';

class SaeRank
{
    private $db;
    private $table = 'rank';

    public function __construct()
    {
        $this->db = \saelib\db();
    }

    public function clear($namespace)
    {
    }

    public function create($namespace, $number, $expire = 0)
    {
    }
    public function decrease($namespace, $key, $value, $rankReturn = false)
    {
    }
    public function delete($namespace, $key, $rankReturn = false)
    {
    }
    public function errmsg()
    {
    }
    public function errno($name)
    {
    }
    public function getAllName()
    {
    }
    public function getInfo($namespace)
    {
    }
    public function getList ($namespace, $order = false, $offsetFrom = 0, $offsetTo = PHP_INT_MAX)
    {
    }
    public function getRank ($namespace, $key)
    {
    }

    public function getValue($namespace, $key)
    {
    }
    public function increase($namespace, $key, $value, $rankReturn = false)
    {
    }
    public function set($namespace, $key, $value, $rankReturn = false)
    {
    }
    public function setAuth($accesskey, $secretkey)
    {
    }
}
