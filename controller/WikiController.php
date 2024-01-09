<?php
require_once 'config\Connection.php';
require_once 'model\WikiDAO.php';


class WikiController {
    function get_wiki(){
        extract($_POST);
        $getWiki = new WikiDao();
        $shi = $getWiki->getWikiData();
        // var_dump($shi);
        include 'view\home.php';
    }
}

?>