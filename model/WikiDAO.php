<?php
session_start();
class WikiDao {
    private $pdo;

    public function __construct(){
        $this->pdo = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function lastInsertId(){

        $stmt = $this->pdo->prepare("SELECT wiki_id FROM  wikis order by date_created DESC LIMIT 1" );
        $stmt->execute();
        $result = $stmt->fetch();


        return $result;

    }

    public function createWiki($title, $category, $tag, $content) {
    try {
        $user_id = $_SESSION['user_id']; 
        // print_r($_SESSION['user_id']);
        // $category_id = 1;
        // $tag_id = 1;

        // Sanitize user inputs to prevent XSS
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

        $query = "INSERT INTO wikis (user_id, category_id, title, content, date_created, archived)
                  VALUES (:user_id, :category_id, :title, :content, NOW(), 0)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':category_id', $category, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);

        $stmt->execute();

        // You can return the last inserted ID if needed
        return $this->pdo->lastInsertId();
    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}



    public function getWikiData() {
        try {
            $query = "SELECT w.*, u.username as author_name
                      FROM wikis w
                      INNER JOIN users u ON w.user_id = u.user_id
                      WHERE w.archived = 0
                      ORDER BY w.date_created DESC";

            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            // Fetch data as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            // Handle database connection error
            echo "Error: " . $e->getMessage();
        }
    }

    public function getOneWiki($wiki_id) {
        $sql = "SELECT * FROM wikis WHERE wiki_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$wiki_id]);
        return $stmt->fetch();
    }
    
    public function getWikiById($wikiId) {
        try {
            $query = "SELECT w.*, u.username as author_name
                      FROM wikis w
                      JOIN users u ON w.user_id = u.user_id
                      WHERE w.wiki_id = :wiki_id AND w.archived = 0
                      ORDER BY w.date_created DESC";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':wiki_id', $wikiId, PDO::PARAM_INT);
            $stmt->execute();

            // Fetch data as an associative array
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            // Handle database connection error
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateWiki($wikiId, $title, $category_id, $tag, $content) {
    try {

        $sql = "UPDATE wikis SET
            title = ?,
            category_id =?,
            content = ?
            WHERE wiki_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$title, $category_id, $content, $wikiId]);

        /* Update Tags */
        $tagDAO = new TagDao();
        $tagDAO->delete_tags_for_wiki($wikiId);
        foreach($tag as $t) {
            $tagDAO->update_tags_for_wiki($wikiId, $t);
        }

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

    // Helper function to check if a wiki with the given ID exists
    private function wikiExists($wikiId) {
        $query = "SELECT COUNT(*) FROM wikis WHERE wiki_id = :wiki_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':wiki_id', $wikiId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }


    public function deleteWiki($wikiId) {
    try {
        // Check if the wiki exists
        if (!$this->wikiExists($wikiId)) {
            echo "Wiki not found.";
            return false;
        }

        // Delete the wiki from the database
        $query = "DELETE FROM wikis WHERE wiki_id = :wiki_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':wiki_id', $wikiId, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

    public function get_wikis_for_category($category_id) {
        $sql = "SELECT * FROM wikis WHERE category_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$category_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_wikis_for_tag($tag_id) {
        $sql = "SELECT wikis.* FROM wikis
        INNER JOIN wiki_tags ON wikis.wiki_id = wiki_tags.wiki_id
        INNER JOIN tags ON wiki_tags.tag_id = tags.tag_id
        WHERE tags.tag_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$tag_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

     public function archive_wiki($id_wiki) {
        $sql = "UPDATE wikis SET archived = 1 WHERE wiki_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_wiki]);
    }

     public function delete_wiki($id_wiki) {
        $sql = "DELETE FROM wikis WHERE wiki_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_wiki]);
    }
    
     public function repost_wiki($id_wiki) {
        $sql = "UPDATE wikis SET archived = 0 WHERE wiki_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_wiki]);
    }

    public function get_wikis_archived() {
        $sql = "SELECT wikis.title, users.username, wikis.wiki_id FROM wikis
        INNER JOIN users ON wikis.user_id = users.user_id
         WHERE wikis.archived = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
