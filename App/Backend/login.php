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
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $password_hashed);
        $stmt->fetch();

        if (password_verify($password, $password_hashed)) {
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            echo "Login successful.";
            header("Location: ../index.html");
            exit();
        } else {
            echo "alert()";
        }
    } else {
        echo "alertuser()";
    }
    $stmt->close();
    $conn->close();
}
?>