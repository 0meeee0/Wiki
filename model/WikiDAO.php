<?php

class WikiDao {
    private $pdo;

    public function __construct(){
        $this->pdo = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function createWiki(Wiki $wiki) {
        // Implement the logic to insert a new wiki into the database
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
    
    public function getWikiById($wikiId) {
        try {
            $query = "SELECT w.*, u.username as author_name
                      FROM wikis w
                      INNER JOIN users u ON w.user_id = u.user_id
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

    public function updateWiki(Wiki $wiki) {
        // Implement the logic to update a wiki in the database
    }

    public function deleteWiki($wiki_id) {
        // Implement the logic to delete a wiki from the database
    }
}

?>
