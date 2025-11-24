<?php
$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "login";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['action']) && $_POST['action'] === 'remove_from_queue' && isset($_POST['queue_id'])) {
    $queueId = intval($_POST['queue_id']);

    // Remove the song from the queue table
    $stmt = $conn->prepare("DELETE FROM queue WHERE id = ?");
    $stmt->bind_param("i", $queueId);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid action or missing queue ID.";
}

$conn->close();
?>