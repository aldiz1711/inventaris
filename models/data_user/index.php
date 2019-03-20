<?php
    class DataUser
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
            $sql = "SELECT nama,status,password FROM user WHERE username=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $stmt->bind_result($nama,$status,$pw);
            $result = $stmt->fetch();
            if ($result) {
                if (password_verify($password,$pw)) {
                    $_SESSION['status'] = $status;
                    $_SESSION['nama'] = $nama;
                    return true;
                }
                return false;
            }
            return false;
        }

        public function Register($data)
        {
            $username = $data['username'];
            $password = $data['password'];
            $nama = $data['nama'];
            $no_tlp = $data['no_tlp'];
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user(username,password,nama,no_tlp) VALUES(?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssss",$username,$pass,$nama,$no_tlp);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function Logout()
        {
            session_destroy();
            echo "<script>window.location.href ='?page=login'</script>";
        }
    }
?>
