<?php

include 'model\UserDAO.php';

class controller_users{
    function log_in_view() {
        include('view/login.php');
    }
    function log_in(){
        extract($_POST);
        $usersDAO = new UserDao();
        $usersDAO->login($email,$password);
    }

    function sign_up(){
        extract($_POST);
        $usersDAO = new UserDao();
        var_dump($username, $email, $password);
        $usersDAO->singup($username, $email, $password);
        include 'view/register.php';
    }

    function getusers(){
        $usersDAO = new UserDAO();
        $fadi = $usersDAO->getUsersData();
        return $fadi;
    }
    function logout(){
        session_destroy();
        header("location:index.php?action=showhome");
    }
}

?>