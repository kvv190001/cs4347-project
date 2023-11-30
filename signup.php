<?php
session_start(); // Start the session at the beginning of the script

include 'db_connect.php'; // Include DB connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']); 
    // Consider hashing the password here with password_hash()

    // Get the current maximum id
    $result = $conn->query("SELECT MAX(id) AS max_id FROM users");
    $row = $result->fetch_assoc();
    $maxId = $row['max_id'];
    $newId = $maxId + 1;

    // Prepare SQL statement to insert the new user
    $stmt = $conn->prepare("INSERT INTO users (id, username, password, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $newId, $username, $password, $email); // Ensure password is hashed

    // Execute the statement
    if ($stmt->execute()) {
        // Set session variables upon successful account creation
        $_SESSION['user_id'] = $newId;
        $_SESSION['username'] = $username;

        // Redirect to home page
        header("Location: home.html");
        exit();
    } else {
        // Handle errors, such as duplicate username/email, etc.
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>