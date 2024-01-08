<?php
require_once 'config\Connection.php';
require_once 'model\WikiDAO.php';


class WikiController {
    private $wikiDao;

    public function __construct(WikiDao $wikiDao) {
        $this->wikiDao = $wikiDao;
    }

    public function createWiki($userId, $categoryId, $title, $content) {
        // Validate input
        // Create a new Wiki object and save it to the database
        $wiki = new Wiki($userId, $categoryId, $title, $content);
        $this->wikiDao->createWiki($wiki);
    }

    public function getWikiById($wikiId) {
        // Retrieve a specific wiki by ID from the database
        return $this->wikiDao->getWikiById($wikiId);
    }

    // Other wiki-related methods as needed
}

?>