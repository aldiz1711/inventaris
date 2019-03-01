<?php
    class Peminjam
    {
        private $conn;
        public function __construct() {
            require_once("models/core.php");
            $conn = new Database();
            $this->conn = $conn->getConnection();
        }

        public function Login($data)
        {
            $username = $data["username"];
            $password = $data["password"];
            $sql = "SELECT nama,no_tlp,status FROM user WHERE username=? AND password=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ss",$username,$password);
            $stmt->execute();
            $stmt->bind_result($nama,$no_tlp,$status);
            $result = $stmt->fetch();
            if ($result) {
                $_SESSION['username'] = $username;
                $_SESSION['status'] = $status;
                $_SESSION['nama'] = $nama;
                $_SESSION['no_tlp'] = $no_tlp;
                return true;   
            }
        }

        public function Register($data)
        {
            $username = $data['username'];
            $password = $data['password'];
            $nama = $data['nama'];
            $no_tlp = $data['no_tlp'];
            $sql = "INSERT INTO user(username,password,nama,no_tlp) VALUES(?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssss",$username,$password,$nama,$no_tlp);
            $stmt->execute();
        }
    }
?>