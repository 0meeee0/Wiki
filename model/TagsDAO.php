<?php
class TagDao {
    private $pdo;

    public function __construct(){
        $this->pdo = DatabaseConnection::getInstance()->getConnection(); 
    } 

    public function getTags()
    {
        $sql = "SELECT tag_id, tag_name FROM tags";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTag(Tag $tag) {
        // Implement the logic to insert a new tag into the database
    }

    public function getTagById($tag_id) {
        // Implement the logic to retrieve a tag by tag_id from the database
    }

    public function updateTag(Tag $tag) {
        // Implement the logic to update a tag in the database
    }

    public function deleteTag($tag_id) {
        // Implement the logic to delete a tag from the database
    }

    // Additional methods as needed
}
?>