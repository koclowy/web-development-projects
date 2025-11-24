<!-- To display My Playlist -->
<?php
// Database connection
$servername = "localhost:3307";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password (default is empty for XAMPP)
$dbname = "login"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle remove button via AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'])) {
    $remove_id = intval($_POST['remove_id']);
    $delete_sql = "DELETE FROM playlist WHERE id = $remove_id";
    if ($conn->query($delete_sql)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
    exit;
}

// Fetch queue data
$sql = "
    SELECT 
        playlist.id AS playlist_id,
        songs.ID AS song_id,
        songs.title,
        songs.artist,
        songs.album_art,
        songs.file_path
    FROM playlist
    JOIN songs ON playlist.song_id = songs.ID
    ORDER BY playlist.id ASC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Web Application Programming/CSS/playlist.css">
    <link rel="stylesheet" href="/Web Application Programming/CSS/libraryPage.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="playlist-container">
        <h1>My Playlist</h1>
        
        <div id="queue-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="queue-item" data-song-id="<?php echo $row['song_id']; ?>" data-file="<?php echo $row['file_path']; ?>">
                        <img class="album-art" src="<?php echo $row['album_art']; ?>" alt="<?php echo $row['title']; ?>">
                        <div class="queue-info">
                            <p class="song-title"><?php echo $row['title']; ?></p>
                            <p class="song-artist"><?php echo $row['artist']; ?></p>
                        </div>
                        <button class="remove-button" data-id="<?php echo $row['playlist_id']; ?>">Remove</button>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
            <?php endif; ?>
        </div>
        
    </div>

    <script src="/Web Application Programming/javascript/songPage.js"></script>
    <script src="/Web Application Programming/javascript/libraryPage.js"></script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>