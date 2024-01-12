<?php
    
include 'controller/controllerUser.php';
include 'controller/wikicontroller.php';
include 'controller/CategoryController.php';

$user = new controller_users();
$category = new CategoryController();
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
            $wiki->get_wiki_for_display();
            break;

        case "addpost":
            $wiki->add_wiki();
            break;

        case "adding":
            $wiki->add_wiki();
            break;
        
        case "showForm":
            $controller->displayForm();
            break;

        case "admin":
            $user->getusers();
            $category->getcats();
            break;

        default:
            include 'view/login.php';
            break;
    }
} else {
    include 'view/login.php';
}

?>
