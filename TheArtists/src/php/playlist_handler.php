<?php
session_start();

$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "login";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    http_response_code(500);
    exit; // Stop the script silently
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['song_id'])) {
    $song_id = intval($_POST['song_id']);

    // Prevent duplicates
    $check_query = "SELECT * FROM playlist WHERE song_id = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("i", $song_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows === 0) {
        // Insert only if the song isn't already liked
        $stmt = $conn->prepare("INSERT INTO playlist (song_id) VALUES (?)");
        $stmt->bind_param("i", $song_id);
        $stmt->execute();
        $stmt->close();
    }

    $check_stmt->close();
}

$conn->close();
exit; // Ensure the script does not output anything
