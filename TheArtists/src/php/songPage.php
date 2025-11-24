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

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $songId = $_GET['id'];

    // Retrieve the song details from the database based on the ID
    $sql = "SELECT * FROM songs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $songId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $song = $result->fetch_assoc();
        $songTitle = $song['title'];
        $songArtist = $song['artist'];
        $filePath = $song['file_path'];
        $albumArtPath = $song['album_art'];

        // Store the song details in the session
        $_SESSION['current_song'] = [
            'ID' => $songId,
            'title' => $songTitle,
            'artist' => $songArtist,
            'file_path' => $filePath,
            'album_art' => $albumArtPath
        ];

        // Optionally, you can also store whether the song is playing
        $_SESSION['current_song'] = $song;
        $_SESSION['is_playing'] = true; // Set to false if the song is paused
    } else {
        echo "Song not found!";
        exit();
    }

    $stmt->close();
} else {
    echo "No song selected!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Playing</title>
    <link rel="stylesheet" href="/Web Application Programming/CSS/songPage.css">
    <link rel="stylesheet" href="/Web Application Programming/CSS/songQueue.css">
</head>

<body>
    
    <div class="header">
        <?php include('header.php'); ?>
    </div>

    <!-- song and artist name -->
    <div class="songdetails-container">
        <div class="song-details">
            <h2><?php echo $songTitle; ?></h2>
            <h3> <?php echo $songArtist; ?></h3>
        </div>
    </div>

    <!-- wave bar -->
    <div id="waveform"></div>

    <!-- music player -->
    <div class="music-player">
        <!-- music disk and album cover art -->
        <div class="disk-container">
            <img id="musicDisk" src="/Web Application Programming/image/songPage/musicdisk.png" alt="Music Disk">
        </div>
        <div class="music-disk" style="background-image: url('<?php echo $albumArtPath; ?>');">
        </div>
    </div>
    </div>

    <!-- Queue Section -->
    <div id="queue">
        <?php include 'queue_display.php'; ?>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <?php include('songFooter.php'); ?>
    </div>

    <script src="/Web Application Programming/javascript/songPage.js"></script>
</body>

</html>