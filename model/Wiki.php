<?php
class Wiki {
    private $wiki_id;
    private $user_id;
    private $category_id;
    private $title;
    private $content;
    private $date_created;
    private $archived;

    public function __construct($user_id, $category_id, $title, $content) {
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getWikiId() {
        return $this->wiki_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getDateCreated() {
        return $this->date_created;
    }

    public function isArchived() {
        return $this->archived;
    }

}
?>