<?php
include 'db_connect.php'; // Include your DB connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Credentials are correct, redirect to home page
        header("Location: home.html");
        exit();
    } else {
        // Credentials are incorrect
        echo "Invalid username or password";
    }

    $stmt->close();
    $conn->close();
}
?>
