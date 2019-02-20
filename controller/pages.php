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
        if (isset($_SESSION['username'])) {
            return true;
        }
        return false;
    }
    function AdminPages(){
        switch ($this->queryPage) {
            case 'admin':
                include_once('view/admin/home.php');
                break;
        }
    }
    function DefaultPages(){
        switch ($this->queryPage) {
            case 'login':
                include_once('view/includes/login.php');
                break;
            case 'login':
                include_once('view/login.php');
                break;
            case 'login':
                include_once('view/login.php');
                break;
            default:
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