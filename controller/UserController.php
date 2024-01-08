<?php

include 'model\UserDAO.php';


class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['Username'];
            $password = $_POST['password'];

            $userModel = new UserModel();

            if ($userModel->getUserByUsername($username, $password)) {
                // Authentication successful, redirect to a dashboard or another page
                header('Location: dashboard.php');
                exit();
            } else {
                // Authentication failed, display an error message
                echo 'Invalid credentials. Please try again.';
            }
        }
        // If the request method is not POST or authentication fails, display the login form
        include 'views/login.php';
    }
}
?>