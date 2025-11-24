<?php
// Database connection
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Song</title>
</head>
<body>
    
<?php

$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "login";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo "Failed to connect DB: " . $conn->connect_error;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve song details from the form
    $title = $conn->real_escape_string($_POST['title']);
    $artist = $conn->real_escape_string($_POST['artist']);
    $albumName = $conn->real_escape_string($_POST['album_name']);

    // File upload handling for song
    $targetDir = "uploads/songs/";  // The folder where song files will be uploaded
    $fileName = basename($_FILES['file']['name']);  // Get the file name
    $targetFilePath = $targetDir . preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);  // Sanitize the filename
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allowed file types for songs (audio formats)
    $allowedTypes = ['mp3', 'wav', 'ogg'];
    if (!in_array(strtolower($fileType), $allowedTypes)) {
        die("Error: Only MP3, WAV, and OGG files are allowed.");
    }

    // File upload handling for album art
    $albumArtDir = "uploads/album_art/";  // The folder where album art files will be uploaded
    $albumArtFileName = basename($_FILES['album_art']['name']);  // Get the album art file name
    $albumArtFilePath = $albumArtDir . preg_replace("/[^a-zA-Z0-9.]/", "_", $albumArtFileName);  // Sanitize the filename
    $albumArtType = pathinfo($albumArtFilePath, PATHINFO_EXTENSION);

    // Allowed file types for album art (image formats)
    $allowedImageTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($albumArtType), $allowedImageTypes)) {
        die("Error: Only JPG, JPEG, PNG, and GIF files are allowed for album art.");
    }

    // Move the uploaded files to their respective directories
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath) &&
        move_uploaded_file($_FILES['album_art']['tmp_name'], $albumArtFilePath)) {
        
        // Prepare the SQL query to insert metadata into the database
        $sql = "INSERT INTO songs (title, artist, album_name, file_path, album_art) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $title, $artist, $albumName, $targetFilePath, $albumArtFilePath);

        // Execute the query and check for success
        if ($stmt->execute()) {
            echo "Song uploaded and saved successfully!";
        } else {
            echo "Error saving to database: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error: File upload failed.";
    }
}

$conn->close();
?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="title">Song Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="artist">Artist Name:</label>
        <input type="text" id="artist" name="artist" required><br><br>

        <label for="album_name">Album Name:</label>
        <input type="text" id="album_name" name="album_name" required><br><br>

        <label for="file">Select Song File:</label>
        <input type="file" id="file" name="file" accept="audio/*" required><br><br>

        <label for="album_art">Upload Album Art:</label>
        <input type="file" id="album_art" name="album_art" accept="image/*" required><br><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>