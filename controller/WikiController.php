<?php
require_once 'config\Connection.php';
require_once 'model\WikiDAO.php';
require_once 'model\CategoryDAO.php';


class WikiController {
    private $categoryDao;

    public function __construct() {
        $this->categoryDao = new CategoryDao();
    }
    
    

    function get_wiki(){
        // extract($_POST);
        $getWiki = new WikiDao();
        $shi = $getWiki->getWikiData();
        // var_dump($shi);
        include 'view\home.php';
    }
    function get_wiki_for_display(){
        $id = isset($_GET['id'])? $_GET['id']:0;
        // extract($_POST);
        $getWiki = new WikiDao();
        $shi = $getWiki->getWikiById($id);
        // var_dump($shi);
        include 'view\post.php';
    }
    function add_wiki(){
        $categories = $this->categoryDao->getCategories();
        include "view\addpost.php";
        extract($_POST);
        $addWiki = new Wikidao();
        

        $addWiki->createWiki($title, $category, $tag, $content);
        
    }
    
}

?>