<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'wiki');
define('DB_USER', 'root');
define('DB_PASS', '123');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}
?>
