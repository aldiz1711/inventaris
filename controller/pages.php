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
            case 'register':
                include_once('view/includes/register.php');
                break;
            case 'logout':
                include_once('models/data_user/index.php');
                $datauser = new DataUser();
                $datauser->Logout();
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
                include_once('models/data_user/index.php');
                $datauser = new DataUser();
                if (isset($_POST['submit'])) {
                    if ($datauser->Login($_POST)) {
                        if ($_SESSION['status'] == "3") {
                          echo "<script>window.location.href ='?page=admin'</script>";
                        }else if($_SESSION['status'] == "1"){
                          echo "<script>window.location.href ='index.php'</script>";
                        }
                    }
                }
                break;
            case 'register':
                include_once('view/includes/register.php');
                include_once('models/data_user/index.php');
                $datauser = new DataUser();
                if (isset($_POST['submit'])) {
                    if ($datauser->Register($_POST)) {
                        echo "Register Berhasil";
                    }
                    else
                    {
                        echo "Register Gagal";
                    }
                }
                break;
            case 'logout':
                include_once('models/data_user/index.php');
                $datauser = new DataUser();
                $datauser->Logout();
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
        }
        elseif (!Self::AuthenticationPages() && $this->queryPage == "admin") {
            echo "<script>window.location.href = '/Inventaris/?page=login'</script>";
        }
        else{
            Self::DefaultPages();
        }
    }
}
