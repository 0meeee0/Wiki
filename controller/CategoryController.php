<?php
require_once 'model\CategoryDAO.php';
require_once 'config\Connection.php';

class CategoryController {
    private $categoryDao;

    public function __construct() {
        $this->categoryDao = new CategoryDao();
    }

    public function createCategory($categoryName) {
        $category = new CategoryDAO();
        $this->categoryDao->createCategory($categoryName);
        header("Location: index.php?action=admin");
    }

    function getcats(){
        $categoryDAO = new CategoryDAO();
        $cat = $categoryDAO->getCategories();
        // include 'view\dashboard.php';
        return $cat;
    }

    public function displayForm()
    {
        $categories = $this->categoryDao->getCategories();
        include 'view\addpost.php';
    }


    public function deleteCat()
    {
        $categories = $this->categoryDao->delete($_GET["id"]);
        header("Location: index.php?action=admin");
        
    }

    public function modify_catg() {
        $cat_id = $_GET['catg_id'];
        $categoryDAO = new CategoryDao();
        $new_catg_name = $_POST['modCat'];
        $categoryDAO->modify_catg($new_catg_name, $cat_id);
        header('location: index.php?action=admin');
        exit;
    }
}

?>