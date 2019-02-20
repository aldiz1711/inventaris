<?php
class Database
{
    private $conn;
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $db = 'absensi';

    public function __construct()
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
