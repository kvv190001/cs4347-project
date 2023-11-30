<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Episode Review</title>
    <link rel="stylesheet" href="styles.css">
    <script src="Episode.js"></script>
</head>
<body>
    <div class="container">
        <h1>Episode Review</h1>

        <!-- Review Form -->
        <div class="review-form">
            <form action="submit_review.php" method="post">
                <!-- Show Name Dropdown -->
                <div class="episode-details">
                    <h3>Show Name:</h3>
                    <select id="showName" name="showName" onchange="updateEpisodeDropdown()">
                        <?php
                        include 'db_connect.php';
                        $result = $conn->query("SELECT show_id, title FROM shows");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['show_id'] . "'>" . htmlspecialchars($row['title']) . "</option>";
                        }
                        $conn->close();
                        ?>
                    </select>

                    <!-- Episode Number Dropdown -->
                    <p>Episode Number:</p>
                    <select id="episodeNumber" name="episodeNumber">
                        <!-- Options will be populated based on JavaScript -->
                    </select>
                </div>

                <!-- Rating -->
                <label for="rating">Rating (1-10):</label>
                <input type="number" id="rating" name="rating" min="1" max="10" required><br>
                
                <!-- Review Text -->
                <label for="review">Your Review:</label>
                <textarea id="review" name="review" rows="5" required></textarea><br>

                <!-- Submit Button -->
                <input type="submit" value="Submit Review">
            </form>
        </div>
    </div>

    <script>
        // JavaScript to handle dynamic dropdown and form submission
        updateEpisodeDropdown();
    </script>
</body>
</html>
