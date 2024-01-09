<?php
include 'model\User.php';
include 'config\Connection.php';

class UserDao {
    private $pdo;
    public function __construct(){
        $this->pdo = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function login($email, $password) {
    $query = "SELECT * FROM users WHERE email = :email;";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $hashedPassword = $user['password']; // Assuming the hashed password is stored in the 'password' column

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['author_name'] = $user[0]['author_name'];
            header("Location: index.php?action=showhome");
            exit(); // Add exit to stop script execution after redirect
        } else {
            // Incorrect password
            header("Location: index.php");
            exit(); // Add exit to stop script execution after redirect
        }
    } else {
        // User not found
        header("Location: index.php");
        exit(); // Add exit to stop script execution after redirect
    }
}



    public function singup($username, $email, $password) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = 'auteur';

        $query = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();

        // Check if the user was successfully created
        if ($stmt->rowCount() > 0) {
            echo "User created successfully!";
            header("Location:index.php");
        } else {
            echo "Error creating user.";
        }
    }


    public function getUserById($user_id) {
        // Implement the logic to retrieve a user by user_id from the database
    }

    public function getUserByEmail($email) {
        // Implement the logic to retrieve a user by user_id from the database
    }

    public function getUserByUsername(User $user) {
        // Implement the logic to update a user in the database
    }
    public function updateUser(User $user) {
        // Implement the logic to update a user in the database
    }

    public function deleteUser($user_id) {
        // Implement the logic to delete a user from the database
    }

    // Additional methods as needed
}
?>