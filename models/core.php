<?php
class Database
{
    private $conn;
    var $host = 'localhost:3306';
    var $user = 'root';
    var $pass = '';
    var $db = 'inventaris_app';

    public function getConnection()
    {
        $this->conn = new MYSQLI($this->host,$this->user,$this->pass,$this->db);
        if ($this->conn) {
            return $this->conn;
        }
        else{
            return "Something Error : ".$this->conn->error();
        }
    }
}
