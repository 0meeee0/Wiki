<?php
    
include 'controller/controllerUser.php';
include 'controller/wikicontroller.php';

$user = new controller_users();
$wiki = new WikiController();

if (isset($_GET["action"])) {
    $action = $_GET["action"];

    switch ($action) {
        case "signup":
            $user->sign_up();
            include 'view/register.php';
            break;

        case "ok":
            include 'view/register.php';
            break;

        case "ak":
            include 'view/login.php';
            break;

        case "login":
            $user->log_in();
            break;

        case "showhome":
            $wiki->get_wiki();
            break;

        case "thepost":
            include 'view/post.php';
            break;

        default:
            include 'view/login.php';
            break;
    }
} else {
    include 'view/login.php';
}

?>
