<?php
    class Keluar
    {
        private $conn;
        public function __construct() {
            require_once("models/core.php");
            $this->conn = new Database();
        }
    }
    