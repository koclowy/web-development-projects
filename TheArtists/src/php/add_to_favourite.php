<?php
$data = json_decode(file_get_contents("php://input"), true);
$artist_id = $data['artist_id'];

// Database connection
$conn = new mysqli("localhost:3307", "root", "", "login");
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "DB connection failed"]));
}

// Check if the artist already exists in the favourites table
$check_query = $conn->prepare("SELECT * FROM favourites WHERE artist_id = ?");
$check_query->bind_param("i", $artist_id);
$check_query->execute();
$result = $check_query->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "error" => "Artist already in favourites"]);
} else {
    // Insert into favourites
    $stmt = $conn->prepare("INSERT INTO favourites (artist_id) VALUES (?)");
    $stmt->bind_param("i", $artist_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
}
$conn->close();
?>