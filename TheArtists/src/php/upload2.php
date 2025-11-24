<?php
// Database connection
session_start();
$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "login";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Failed to connect DB: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $image = $_FILES['profile_picture'];

    // Handle image upload
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Create uploads directory if it doesn't exist
    }
    $target_file = $target_dir . basename($image["name"]);

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Insert artist into the database
        $stmt = $conn->prepare("INSERT INTO artists (name, profile_picture) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $target_file);

        if ($stmt->execute()) {
            echo "<p>Artist uploaded successfully!</p>";
        } else {
            echo "<p>Failed to upload artist: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Failed to upload image.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Artists</title>
</head>
<body>
    <h1>Upload Artist</h1>
    <form action="upload2.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Artist Name" required>
        <input type="file" name="profile_picture" required>
        <button type="submit">Upload Artist</button>
    </form>
</body>
</html>