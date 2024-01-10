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
    function add_wiki(){
        extract($_POST);
        $addWiki = new Wikidao();
        $categories = $this->categoryDao->getCategories();

        // $addWiki->createWiki($title, $category, $tag, $content, $image);
        include "view\addpost.php";
    }
    
}

?>