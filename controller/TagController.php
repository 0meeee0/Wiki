<?php
require_once 'config\Connection.php';
require_once 'model\TagsDAO.php';


class TagController {
    private $tagDao;

    public function __construct(TagDao $tagDao) {
        $this->tagDao = $tagDao;
    }

    public function createTag($tagName) {
        // Validate input
        // Create a new Tag object and save it to the database
        $tag = new Tag($tagName);
        $this->tagDao->createTag($tag);
    }

    // public function getAllTags() {
    //     // Retrieve all tags from the database
    //     return $this->tagDao->getAllTags();
    // }

    // Other tag-related methods as needed
}

?>