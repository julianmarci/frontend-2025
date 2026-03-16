<?php
require 'db.php';

// Get values from URL: login.php?username=foo&password=bar
$username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);

if ($username && $password) {

    // Fetch user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }

} else {
    echo "Please provide username and password via GET.";
}

$host = 'localhost';
$db   = 'testdb';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>