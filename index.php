<?php
    
include 'controller/controllerUser.php';
include 'controller/wikicontroller.php';
include 'controller/CategoryController.php';
include 'controller/TagController.php';

$user = new controller_users();
$category = new CategoryController();
$wiki = new WikiController();
$tag = new TagController();

// session_start();

if (isset($_GET["action"])) {
    $action = $_GET["action"];

    switch ($action) {
        case "signup":
            $user->sign_up();
            break;

        case "ok":
            include 'view/register.php';
            break;

        case "ak":
            include 'view/login.php';
            break;

        case "log_in":
            $user->log_in_view();
            break;

        case "login":
            $user->log_in();
            break;

        case "logout":
            $user->logout();
            break;

        case "showhome":
            $wiki->get_wiki();
            break;

        case "thepost":
            $wiki->get_wiki_for_display();
            break;

        case 'archive':
            $wiki->archive_wiki();
            break;

        case "deleteWiki":
            $wiki->delete_wiki();
            break;

        case 'repost' :
            $wiki->repost_wiki();
            break;

        case "addpost":
            $wiki->add_wiki();
            break;

        case "adding":
            $wiki->ajoute_wiki();
            break;
        
        case "showForm":
            $controller->displayForm();
            break;

        case "admin":
            $cat = $category->getcats();
            $fadi = $user->getusers();
            $tags = $tag->getTags();
            $shi = $wiki->wikis_archived();
            // echo '<pre>';
            // print_r($shi);
            include 'view\dashboard.php';
            break;

        case "addcat":
             $category->createCategory($_POST["newCategory"]);
            break;

        case "delcat":
             $category->deleteCat();
            break;

        case "modifycat":
            $category->modify_catg();
            break;

        case "addtag":
             $tag->createTag($_POST["newTag"]);
            break;

        case "deltag":
             $tag->deleteTag();
            break;

        case "modifyWiki":
            $wiki->modify_wiki($_GET['wiki_id']);
            break;

        case "modify_action":
            $wiki->modify_action();
            break;

        case "modifytag":
            $tag->modifyTag();
            break;
    }
} else {
    header("location:?action=showhome");
    // include "view/home.php";
    exit;
}

?>
