<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $password_hashed);
        $stmt->fetch();

        if (password_verify($password, $password_hashed)) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            echo "Login successful.";
            header("Location: ../index.php");
            exit();
        } else {
            echo "alert('Invalid password.');";
        }
    } else {
        echo "alert('Invalid email.');";
    }
    $stmt->close();
    $conn->close();
}
?>
