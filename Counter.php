<?php

require_once __DIR__.'/db.php';

class SaeCounter
{
    private $db;
    private $table = 'counter';

    public function __construct()
    {
        $this->db = \saelib\db();
    }

    public function create($name, $value = 0)
    {
        $this->db->beginTransaction();
        if ($this->length() >= 100) {
            $this->db->rollback();
            return false;
        }
        if ($this->exists($name)) {
            $this->db->rollback();
            return false;
        }
        $sql = "insert into $this->table (name, value) values (?,?)";
        $stmt = $this->db->prepare($sql);
        if (!$stmt->execute(array($name, $value))) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        $this->db->commit();
        return true;
    }

    public function set($name, $value) {
        $this->db->beginTransaction();
        if (!$this->exists($name)) {
            $this->db->rollback();
            return false;
        }
        $sql = "update $this->table set value=? where name=?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt->execute(array($value, $name))) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        $this->db->commit();
        return true;
    }
    public function incr($name, $value = 1) {
        $this->db->beginTransaction();
        if (!$this->exists($name)) {
            $this->db->rollback();
            return false;
        }
        $sql = "update $this->table set value=value-? where name=?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt->execute(array($value, $name))) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        $this->db->commit();
        return true;
    }
    public function get($name) {
        $stmt = $this->db->prepare("select value from `$this->table` where name=?");
        if (!$stmt->execute(array($name))) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row) {
            return $row[0];
        }
        return false;
    }
    public function decr($name, $value = 1) {
        return $this->db->incr($name, -$value);
    }
    public function exists($name) {
        $stmt = $this->db->prepare("select count(id) from `$this->table` where name=?");
        if (!$stmt->execute(array($name))) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        $row = $stmt->fetch(PDO::FETCH_NUM);
        return $row[0] == 1;
    }
    public function getall() {
        $stmt = $this->db->prepare("select name, value from `$this->table`");
        if (!$stmt->execute()) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listAll() {
        return $this->getall();
    }
    public function mget (array $names) {
        $sql = "select name, value from `$this->table` where name in ";
        $sql .= '('.implode(',', array_map(function () {return '?';}, $names)).')';
        $stmt = $this->db->prepare($sql);
        if (!$stmt->execute($names)) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function remove ($name){
        $sql = "delete FROM $this->table where name=?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt->execute(array($name))) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        return (bool) $stmt->rowCount();
    }

    public function length()
    {
        $stmt = $this->db->prepare("select count(id) from `$this->table`");
        if (!$stmt->execute()) {
            throw new Exception("{$this->db->errorCode()} ".implode(' | ', $this->db->errorInfo()), 1);
        }
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row) {
            return $row[0];
        }
        return null;
    }
}
