<!-- Available Song Page -->
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

// Retrieve songs from the database, ordered by artist and album
$sql = "SELECT ID, title, artist, album_name, album_art FROM songs ORDER BY artist, album_name";
$result = $conn->query($sql);

// Group songs by artist and album
$songs_by_artist = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Group by artist
        if (!isset($songs_by_artist[$row['artist']])) {
            $songs_by_artist[$row['artist']] = [];
        }

        // Group by album under each artist
        if (!isset($songs_by_artist[$row['artist']][$row['album_name']])) {
            $songs_by_artist[$row['artist']][$row['album_name']] = [];
        }

        // Add the song to the appropriate artist and album
        $songs_by_artist[$row['artist']][$row['album_name']][] = $row;
    }
}

$current_song = isset($_SESSION['current_song']) ? $_SESSION['current_song'] : null;
$is_playing = isset($_SESSION['is_playing']) ? $_SESSION['is_playing'] : false;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Songs</title>
    <!-- Link your external CSS file -->
    <link rel="stylesheet" href="/Web Application Programming/CSS/songList.css">
    <link rel="stylesheet" href="/Web Application Programming/CSS/songFooter.css">
    <link rel="stylesheet" href="/Web Application Programming/CSS/songQueue.css">
</head>

<body>

    <div class="header">
        <?php include('header.php'); ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- PHP Code to Display Songs -->
    <?php
    if (!empty($songs_by_artist)) {
        foreach ($songs_by_artist as $artist => $albums) {
            echo "<div class='artist-container'>";
            echo "<h2 class='artist-title'>" . htmlspecialchars($artist) . "</h2>";

            foreach ($albums as $album => $songs) {
                echo "<div class='album-container'>";
                echo "<h3 class='album-title'>" . htmlspecialchars($album) . "</h3>";

                echo "<ul class='song-list'>";
                foreach ($songs as $song) {
                    echo "<li class='song-item'>
                            <img src='" . htmlspecialchars($song['album_art']) . "' alt='Album Art' class='album-art'>
                            <a href='songPage.php?id=" . htmlspecialchars($song['ID']) . "' class='song-title'>" . htmlspecialchars($song['title']) . "</a>
                            <button onclick='addToQueue(" . intval($song['ID']) . ")' class='addBtn'>
                                <img src='/Web Application Programming/image/songPage/add_icon.png' alt='Add to Queue'>
                            </button>
                            <button onclick='likeSong(" . intval($song['ID']) . ")' class='likeBtn'>
                                ❤︎
                            </button>
                            <button onclick='addToPlaylist(" . intval($song['ID']) . ")' class='playlistBtn'>
                                <img src='/Web Application Programming/image/songPage/playlist_icon.png' alt='Add to Playlist'>
                            </button>
                          </li>";
                }
                echo "</ul>";
                echo "</div>";
            }
            echo "</div>";
        }
    } else {
        echo "<p>No songs available.</p>";
    }
    ?>

    <!-- Include Footer -->
    <div class="footer">
        <?php include('songFooter.php'); ?>
    </div>

    <script src="/Web Application Programming/javascript/songList.js"></script>
    <script src="/Web Application Programming/javascript/songPage.js"></script>
    <script src="/Web Application Programming/javascript/libraryPage.js"></script>
</body>

</html>