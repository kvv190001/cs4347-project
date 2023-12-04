<?php
include 'db_connect.php'; 

session_start();
$user_id = $_SESSION['user_id']; 

$stmt = $conn->prepare("SELECT shows.title, episodes.episode_id, reviews.rating, reviews.created_at 
                        FROM reviews 
                        JOIN episodes ON reviews.episode_id = episodes.episode_id
                        JOIN shows ON episodes.show_id = shows.show_id 
                        WHERE reviews.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$reviews = [];
while ($row = $result->fetch_assoc()) {
    $reviews[] = [
        'showTitle' => $row['title'],
        'episodeId' => $row['episode_id'],
        'rating' => $row['rating'],
        'date' => $row['created_at']
    ];
}

echo json_encode($reviews);
$stmt->close();
$conn->close();
?>
