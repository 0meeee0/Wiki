<?php
require_once 'config\Connection.php';
require_once 'model\WikiDAO.php';
require_once 'model\CategoryDAO.php';
require_once 'model\TagsDAO.php';


class WikiController {
    private $categoryDao;

    public function __construct() {
        $this->categoryDao = new CategoryDao();
    }
    
    

    function get_wiki(){
        $getWiki = new WikiDao();
        $tagDAO = new TagDao();
        $shi = $getWiki->getWikiData();
        $tags = [];
        foreach($shi as $wiki) {
            foreach($tagDAO->get_tags_for_wiki($wiki['wiki_id']) as $tag) {
                $tags[$wiki['wiki_id']] [] = $tag['tag_name'];
            }
        }

        include 'view\home.php';
    }
    function get_wiki_for_display(){
        $id = isset($_GET['id'])? $_GET['id']:0;
        $getWiki = new WikiDao();
        $catgDAO = new CategoryDao();
        $tagDAO = new TagDao();
        $shi = $getWiki->getWikiById($id);
        $catg = $catgDAO->get_catg_by_id($shi['category_id']);
        $tags = $tagDAO->get_tags_for_wiki($shi['wiki_id']);
        // var_dump($shi);
        include 'view\post.php';
    }

    function add_wiki(){
        $tagDAO = new TagDAO();
        $tags = $tagDAO->getTags();
        $categories = $this->categoryDao->getCategories();
       
        include "view\addpost.php";        
    }

    function ajoute_wiki(){
        extract($_POST);
        // print_r($_POST);
        $addWiki = new Wikidao();
        $tagDAO = new TagDao();
        $addWiki->createWiki($title, $category, $tag, $content);
        $wiki_id = $addWiki->lastInsertId()[0];
        // print_r($tag);
        foreach($tag as $t) {
            $tagDAO->add_tags_for_wiki($wiki_id, $t);
        }
        // print_r($wiki_id);
        header("location: index.php?action=showhome");

    }

    function modify_wiki($wiki_id) {
        $wikiDAO = new WikiDao();
        $wiki = $wikiDAO->getOneWiki($wiki_id);
        $categorieDAO = new CategoryDAO();
        $categories = $categorieDAO->getCategories();
        $tagDAO = new TagDAO();
        $tags = $tagDAO->getTags();

        $myTags = $tagDAO->get_tags_for_wiki($wiki_id);

        include "view/modifywiki.php";
    }

    public function modify_action() {
        extract($_POST);
        $wikiId = $id;
        $wikiDAO = new WikiDao();
        echo '<pre>';
        print_r($tag);
        $wikiDAO->updateWiki($wikiId, $title, $category, $tag, $content);
        header("location: index.php?action=showhome");
    }
    
    public function delete_wiki() {
         $id = $_GET['wiki_id'];
         $wikiDAO = new WikiDao();
         $wikiDAO->delete_wiki($id);
         header('location: index.php');
    }
    
   public function archive_wiki() {
        $id = $_GET['id'];
        $wikiDAO = new WikiDao();
        $wikiDAO->archive_wiki($id);
        header('location: index.php');
   }

   public function repost_wiki() {
        $id = $_GET['id'];
        $wikiDAO = new WikiDao();
        $wikiDAO->repost_wiki($id);
        header('location: index.php?action=admin');
        exit;
   }

   public function wikis_archived(){
        $wikiDAO = new WikiDao();
        return $wikiDAO->get_wikis_archived();

   }
    
}

?>