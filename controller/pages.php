<?php
class Page
{
    var $queryPage = '';
    private function CheckingQuery(){
        if (isset($_GET['page'])) {
            $this->queryPage = $_GET['page'];
        }
    }
    private function AuthenticationPages(){
        if (isset($_SESSION['status'])) {
            return $_SESSION['status'];
        }
        return null;
    }
    private function AdminPages(){
        switch ($this->queryPage) {
            case 'logout':
                include_once('models/data_user/index.php');
                $datauser = new DataUser();
                $datauser->Logout();
                break;
            default:
                include_once('view/includes/header/home.php');
                include_once('view/includes/sidebar/home.php');
                break;

        }
    }

    private function PeminjamPages()
    {
        switch ($this->queryPage) {
            case 'logout':
                include_once('models/data_user/index.php');
                $datauser = new DataUser();
                $datauser->Logout();
                break;
            default:
                include_once('view/includes/header/home.php');
                include_once('view/includes/sidebar/home.php');
                break;
        }
    }

    private function DefaultPages(){
        switch ($this->queryPage) {
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
                include_once('view/includes/login.php');
                include_once('models/data_user/index.php');
                $datauser = new DataUser();
                if (isset($_POST['submit'])) {
                    if ($datauser->Login($_POST)) {
                        echo "<script>window.location.href ='/Inventaris/'</script>";
                    }
                }
                break;
        }
    }
    public function CorePages(){
        Self::CheckingQuery();
        if (Self::AuthenticationPages() == "1")
        {
            // Admin
            Self::AdminPages();
        } else if(Self::AuthenticationPages() == "2")
        {
            // Operator
        }else if(Self::AuthenticationPages() == "3")
        {
            // Peminjam
            Self::PeminjamPages();
        }else{
            // Defau
            Self::DefaultPages();
        }

    }
}
