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

        public function createTag($TagName) {
        $sql = "INSERT INTO tags(`tag_name`) VALUES (:tname)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':tname', $TagName, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function add_tags_for_wiki($wiki_id, $tag_id) {
        $sql = "INSERT INTO wiki_tags VALUES(?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$wiki_id, $tag_id]);

    }

    public function modTags($new_tag_name, $tag_id){
        $sql = "UPDATE tags SET tag_name = ? WHERE tag_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$new_tag_name, $tag_id]);
    }

    public function delete($tag_id){
        $sql = "DELETE FROM `tags` WHERE tag_id = :tagid";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':tagid', $tag_id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function get_tags_for_wiki($wiki_id) {
        $sql = "SELECT tags.* FROM tags
        INNER JOIN wiki_tags ON wiki_tags.tag_id = tags.tag_id
        INNER JOIN wikis ON wikis.wiki_id = wiki_tags.wiki_id
        WHERE wikis.wiki_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$wiki_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_tags_for_wiki($wiki_id) {
        $query = "DELETE FROM wiki_tags WHERE wiki_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$wiki_id]);
    }

    public function update_tags_for_wiki($wiki_id, $new_tag_id) {
        
        $sql = "INSERT INTO wiki_tags VALUES (?, ?)";
        $stmt1 = $this->pdo->prepare($sql);
        $stmt1->execute([$wiki_id, $new_tag_id]);
    }
}
?>