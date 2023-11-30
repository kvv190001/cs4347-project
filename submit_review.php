<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['showName'], $_POST['episodeNumber'], $_POST['rating'], $_POST['review'], $_SESSION['user_id'])) {
        $showId = (int)$_POST['showName'];
        $episodeNumber = (int)$_POST['episodeNumber'];
        $rating = (int)$_POST['rating'];
        $reviewBody = $_POST['review'];
        $userId = $_SESSION['user_id'];

        $reviewResult = $conn->query("SELECT MAX(review_id) AS max_id FROM reviews");
        $reviewRow = $reviewResult->fetch_assoc();
        $newReviewId = $reviewRow['max_id'] + 1;

        $stmt = $conn->prepare("INSERT INTO reviews (review_id, show_id, rating, body, user_id, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("iiisi", $newReviewId, $showId, $rating, $reviewBody, $userId);

        if ($stmt->execute()) {
            header("Location: home.html");
        } else {
            echo "Error submitting review: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: Missing data";
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
