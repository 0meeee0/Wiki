<?php
    
    include 'controller/controllerUser.php';

    $login = new controller_users();

    if(isset($_GET["action"])){
        $action = $_GET["action"];
        if($action === "signup"){
            include 'view/register.php';
        } elseif($action === "login"){
            $login->login();
            // echo 'la';
        }
    } else {
        include 'view/login.php';
    }
?>
