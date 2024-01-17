<?php

    // include 'model\Category.php';
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

    public function createCategory($categoryName) {
        $sql = "INSERT INTO categories(`category_name`) VALUES (:cname)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':cname', $categoryName, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function modify_catg($new_catg_name, $catg_id) {
        $sql = "UPDATE categories SET category_name = ? WHERE category_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$new_catg_name, $catg_id]);
    }

    public function get_catg_by_id($id){
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


    public function delete($category_id){
        $sql = "DELETE FROM `categories` WHERE category_id = :catid";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':catid', $category_id, PDO::PARAM_STR);
        $stmt->execute();
    }

}
?>