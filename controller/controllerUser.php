<?php

include 'model\UserDAO.php';

class controller_users{
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
    }

    function getusers(){
        $usersDAO = new UserDAO();
        $fadi = $usersDAO->getUsersData();
        include 'view\dashboard.php';
    }
}

?>