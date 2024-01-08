<?php
class Tag {
    private $tag_id;
    private $tag_name;

    public function __construct($tag_name) {
        $this->tag_name = $tag_name;
    }

    public function getTagId() {
        return $this->tag_id;
    }

    public function getTagName() {
        return $this->tag_name;
    }

}
?>