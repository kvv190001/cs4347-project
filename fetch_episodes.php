<?php
include 'db_connect.php'; 

if (isset($_GET['show_id'])) {
    $showId = intval($_GET['show_id']);

    $stmt = $conn->prepare("SELECT episode_id FROM episodes WHERE show_id = ?");
    $stmt->bind_param("i", $showId);
    $stmt->execute();
    $result = $stmt->get_result();

    $episodes = [];
    while ($row = $result->fetch_assoc()) {
        $episodes[] = $row['episode_id'];
    }

    // Sending back both the episodes and the count
    $response = [
        'episodes' => $episodes,
        'count' => count($episodes)
    ];

    echo json_encode($response);
    $stmt->close();
}

$conn->close();
?>
