<?php

    include 'model\Category.php';
 class CategoryDAO {
    private $pdo;

    public function __construct(){
        $this->pdo = DatabaseConnection::getInstance()->getConnection(); 
    } 

    public function getCategories()
    {
        $sql = "SELECT category_id, category_name FROM categories";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCategory() {
        
    }

}
?>