<?php
include 'model\User.php';
include 'config\Connection.php';

class UserDao {
    private $pdo;
    public function __construct(){
        $this->pdo = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function login($email,$password){
        $query = "SELECT * FROM users WHERE email = :email AND password = :password;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindparam(':email', $email, PDO::PARAM_STR);

        $stmt->bindparam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_users = count($result);
        if( $number_of_users == 1 ){
            // echo "dkhl";
            header("Location:view/home.html");
        }else{
            echo "la";
            header("Location:index.php");
            // echo "no";
        }

    }
    public function createUser(User $user) {
        // Implement the logic to insert a new user into the database
        // Make use of prepared statements to prevent SQL injection
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