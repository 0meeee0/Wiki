<?php
require_once 'config\Connection.php';
require_once 'model\TagsDAO.php';


class TagController {
    private $tagDao;

    public function __construct() {
        $this->tagDao = new TagDao();
    }


    public function displayFormm()
    {
        $tagDAO = $this->tagDao->getTags();
        include 'view\addpost.php';
    }

        function getTags(){
        $tagDAO = new TagDAO();
        $tags = $tagDAO->getTags();

        // include 'view\dashboard.php';
        return $tags;
    }

    public function createTag($tagName) {
        $tag = new TagDAO();
         $tagDao= $tag->createTag($tagName);
        header("Location: index.php?action=admin");
    }

    public function modifyTag(){
        $tag_id = $_GET['id_tag'];
        $tagDAO = new TagDao();
        $new_name_tag = $_POST['modTag'];
        $tag = $tagDAO->modTags($new_name_tag, $tag_id);
        header('location: index.php?action=admin');
        exit;
        
    }

    public function deleteTag()
    {
        $tagDAO = $this->tagDao->delete($_GET["id"]);
        header("Location: index.php?action=admin");
        
    }
}

?>