<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    require_once('db_connect.php');

    // Escape user inputs for security
    $email = mysqli_real_escape_string($conn, $_POST['signup-email']);
    $phone = mysqli_real_escape_string($conn, $_POST['signup-phone']);
    $password = mysqli_real_escape_string($conn, $_POST['signup-password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

    // Perform validation (e.g., check if passwords match)
    if ($password != $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user into database
    $sql = "INSERT INTO users (email, password, phone) VALUES ('$email', '$hashed_password', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
        // You can redirect to login page or any other page after successful registration
        // header("Location: /App/index.html");
        // exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
