<?php
require_once 'model/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct(UserModel $userModel) {
        $this->userModel = $userModel;
    }

    public function processLogin($username, $password) {
        if (empty($username) || empty($password)) {
            echo "Please provide both username and password.";
            return;
        }

        $user = $this->userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user->password)) {
            header("Location: u.html");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    }
}
?>
