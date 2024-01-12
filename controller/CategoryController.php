<?php
require_once 'model\CategoryDAO.php';
require_once 'config\Connection.php';

class CategoryController {
    private $categoryDao;

    public function __construct() {
        $this->categoryDao = new CategoryDao();
    }

    public function createCategory($categoryId, $categoryName) {
        $category = new Category($categoryId, $categoryName);
        $this->categoryDao->createCategory($category);
    }

    function getcats(){
        $categoryDAO = new CategoryDAO();
        $cat = $categoryDAO->getCategories();
        include 'view\dashboard.php';
    }

    public function displayForm()
    {
        $categories = $this->categoryDao->getCategories();
        include 'view\addpost.php';
    }

    // public function getAllCategories() {
    //     // Retrieve all categories from the database
    //     return $this->categoryDao->getAllCategories();
    // }

    // Other category-related methods as needed
}

?>