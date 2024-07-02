<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['signup-email'];
    $phone = $_POST['signup-phone'];
    $password = $_POST['signup-password'];
    $confirm_password = $_POST['confirm-password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email already taken.";
        $stmt->close();
        exit();
    }

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (email, phone, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $phone, $password_hashed);

    if ($stmt->execute()) {
        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;
        echo "Registration successful.";
        // Redirect to a different page (e.g., home page)
        header("Location: ../index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
