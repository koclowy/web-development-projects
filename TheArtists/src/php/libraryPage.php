<?php
// Database connection
session_start();
// Assuming user authentication has been handled
$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "login";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Failed to connect DB: " . $conn->connect_error);
}

// Fetch all recommended artists
$artists = $conn->query("SELECT * FROM artists");

// Fetch favourite artists
$favourites = $conn->query("
    SELECT artists.* 
    FROM favourites 
    INNER JOIN artists ON favourites.artist_id = artists.id
");

$current_song = isset($_SESSION['current_song']) ? $_SESSION['current_song'] : null;
$is_playing = isset($_SESSION['is_playing']) ? $_SESSION['is_playing'] : false;
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library</title>
    <link rel="stylesheet" href="/Web Application Programming/CSS/libraryPage.css">

</head>

<body>
    <!--Including the Header-->
    <div class="header">
        <?php include 'header.php'; ?>
    </div>

    <!--Page container, wraps the two containers: Recommended Container and Main Container-->
    <div class="page-content">
        <!-- Recommended Artists Section -->
        <div class="recommend-container">
            <h1>Recommended Artists</h1>
            <div class="horizontal-container">
                <?php while ($artist = $artists->fetch_assoc()): ?>
                    <div class="artist-card">
                        <img src="<?php echo $artist['profile_picture']; ?>" alt="Profile Picture">
                        <h3><?php echo $artist['name']; ?></h3>
                        <button class="add-to-fav" data-id="<?php echo $artist['id']; ?>">Add to Favourite</button>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- Main Container containing: Favourite Artist, My Playlist and Liked Songs  -->
        <div class="main-container">
            <!-- My Favourite Artists Section -->
            <div class="favourite-container">
                <h1>My Favourite Artists</h1>
                <div class="favourite-list">
                    <?php if ($favourites->num_rows > 0): ?>
                        <?php while ($fav = $favourites->fetch_assoc()): ?>
                            <div class="artist-card">
                                <img src="<?php echo $fav['profile_picture']; ?>" alt="Profile Picture">
                                <h3><?php echo $fav['name']; ?></h3>
                                <button class="remove-from-fav" data-id="<?php echo $fav['id']; ?>">Remove</button>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- My Playlist Section -->
            <div id="playlist">
                <?php include 'playlist_display.php'; ?>
            </div>

            <!-- My Liked Songs Section -->
            <div id="liked-songs">
                <?php include 'likedSong_display.php'; ?>
            </div>
        </div>
    </div>

    <!-- Include the footer -->
    <div class="footer">
        <?php include('songFooter.php'); ?>
    </div>

    <script src="/Web Application Programming/javascript/libraryPage.js"></script>
    <script src="/Web Application Programming/javascript/songPage.js"></script>
    <script src="/Web Application Programming/javascript/songList.js"></script>
</body>

</html>