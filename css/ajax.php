<?php

require '../config/Connection.php';
require '../model/CategoryDAO.php';
require '../model/TagsDAO.php';
require '../model/WikiDAO.php';


if(isset($_GET['search'])) {
    if($_GET['search'] !== "") {
        $search = $_GET['search'];

        $wikiDAO = new WikiDao();
        $wikis = $wikiDAO->getWikiData();

        $catgDAO = new CategoryDAO();
        $categories = $catgDAO->getCategories();

        $tagDAO = new TagDao();
        $tags = $tagDAO->getTags();

        $result = [];

        foreach($wikis as $wiki) {
            if(stristr($wiki['title'], $search)) {
                $result[] = $wiki['wiki_id'];
            }
        }

        foreach($categories as $category) {
            if(stristr($category['category_name'], $search)) {
                $wikis_for_catg = $wikiDAO->get_wikis_for_category($category['category_id']);
                foreach($wikis_for_catg as $wiki) {
                    $result[] = $wiki['wiki_id'];
                }
            }
        }

        foreach($tags as $tag) {
            if(stristr($tag['tag_name'], $search)) {
                $wikis_for_tag = $wikiDAO->get_wikis_for_tag($tag['tag_id']);
                foreach($wikis_for_catg as $wiki) {
                    $result[] = $wiki['wiki_id'];
                }
            }
        }

        echo json_encode($result);
    }
}










?>