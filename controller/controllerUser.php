<?php

include 'model\UserDAO.php';

class controller_users{
    function login(){
        extract($_POST);
        $usersDAO = new UserDao();
        $usersDAO->login($email,$password);
    }

}


?>