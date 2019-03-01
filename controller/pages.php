<?php
class Page
{
    var $queryPage = '';
    function CheckingQuery(){
        if (isset($_GET['page'])) {
            $this->queryPage = $_GET['page'];
        }
    }
    function AuthenticationPages(){
        if (isset($_SESSION['status']) && $_SESSION['status'] == "3") {
            return true;
        }
        return false;
    }
    function AdminPages(){
        switch ($this->queryPage) {
            case 'admin':
                include_once('view/admin/home.php');
                break;
            default:
                include_once('view/admin/home.php');
                break;

        }
    }

    function DefaultPages(){
        switch ($this->queryPage) {
            case 'login':
                include_once('view/includes/login.php');
                include_once('models/peminjam/index.php');
                $peminjam = new Peminjam();
                if (isset($_POST['submit'])) {
                    if ($peminjam->Login($_POST)) {
                        echo "<script>window.location.href ='?page=home'</script>";
                    }
                }
                break;
            case 'register':
                include_once('view/includes/register.php');
                break;
            default:
                include_once('models/keluar/index.php');
                $keluar = new Keluar();
                include_once('view/includes/home.php');
                break;
        }
    }
    function CorePages(){
        if (Self::AuthenticationPages()) {
            Self::AdminPages();
        }else{
            Self::DefaultPages();
        }
    }
}