<?php
session_start();
include 'db_connect.php'; // Include DB connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if ($password === $user['password']) { 
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to home page
            header("Location: home.html");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid username or password";
        }
    } else {
        // Username doesn't exist
        echo "Invalid username or password";
    }

    $stmt->close();
    $conn->close();
}
?>
