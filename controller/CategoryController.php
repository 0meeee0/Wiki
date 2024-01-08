<?php
require_once 'model\CategoryDAO.php';
require_once 'config\Connection.php';

class CategoryController {
    private $categoryDao;

    public function __construct(CategoryDao $categoryDao) {
        $this->categoryDao = $categoryDao;
    }

    public function createCategory($categoryName) {
        // Validate input
        // Create a new Category object and save it to the database
        $category = new Category($categoryName);
        $this->categoryDao->createCategory($category);
    }

    // public function getAllCategories() {
    //     // Retrieve all categories from the database
    //     return $this->categoryDao->getAllCategories();
    // }

    // Other category-related methods as needed
}

?>