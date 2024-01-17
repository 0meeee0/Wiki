<?php
include 'model\User.php';
include 'config\Connection.php';

class UserDao {
    private $pdo;
    public function __construct(){
        $this->pdo = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function getUsersData() {
        try {
            $query = "SELECT user_id, username, email, role FROM users";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            // Fetch data as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function login($email, $password) {
    $query = "SELECT * FROM users WHERE email = :email;";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $hashedPassword = $user['password'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            if($user['role'] == "auteur"){
                include "index.php?action=showhome";
                header("Location: index.php?action=showhome");

            }
            else {
                header("Location: index.php?action=admin");
            }
        } else {
            // Incorrect password
            // header("Location: index.php");
            echo "Incorrect Password";
        }
    } else {
        // User not found
        echo "User not found, please register";

    }
}



    public function singup($username, $email, $password) {
    try{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = 'auteur';

        $query = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
                header("Location:index.php?action=log_in");
            } else {
            echo "Error creating user.";
            }
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}
?>