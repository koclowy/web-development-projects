<?php
$data = json_decode(file_get_contents("php://input"), true);
$artist_id = $data['artist_id'];

// Database connection
$conn = new mysqli("localhost:3307", "root", "", "login");
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "DB connection failed"]));
}

// Remove artist from favourites
$stmt = $conn->prepare("DELETE FROM favourites WHERE artist_id = ?");
$stmt->bind_param("i", $artist_id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>