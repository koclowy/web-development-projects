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
    $delete_sql = "DELETE FROM queue WHERE id = $remove_id";
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
        queue.id AS queue_id,
        songs.ID AS song_id,
        songs.title,
        songs.artist,
        songs.album_art,
        songs.file_path
    FROM queue
    JOIN songs ON queue.song_id = songs.ID
    ORDER BY queue.id ASC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Web Application Programming/CSS/songQueue.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="queue-container">
        <h1>Queue</h1>
        <div id="queue-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="queue-item" data-song-id="<?php echo $row['song_id']; ?>" data-file="<?php echo $row['file_path']; ?>">
                        <img class="album-art" src="<?php echo $row['album_art']; ?>" alt="<?php echo $row['title']; ?>">
                        <div class="queue-info">
                            <p class="song-title"><?php echo $row['title']; ?></p>
                            <p class="song-artist"><?php echo $row['artist']; ?></p>
                        </div>
                        <button class="remove-button" data-id="<?php echo $row['queue_id']; ?>">Remove</button>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No songs in the queue.</p>
            <?php endif; ?>
        </div>
        <div class="back-to-list-container">
            <a href="/Web Application Programming/php/songList.php" class="back-to-list-button">Back to Song List</a>
        </div>
    </div>

    <script src="/Web Application Programming/javascript/songPage.js"></script>
    <script>
        $(document).ready(function() {
            // Handle song click
            $(document).on('click', '.queue-item', function() {
                const songId = $(this).data('song-id');
                parent.location.href = `/Web Application Programming/php/songPage.php?song_id=${songId}`;
            });

            // Handle remove button
            $(document).on('click', '.remove-button', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Prevent the parent queue-item click event
                const queueId = $(this).data('id');
                const parentItem = $(this).closest('.queue-item');

                $.ajax({
                    url: '/Web Application Programming/php/queue_display.php',
                    type: 'POST',
                    data: { remove_id: queueId },
                    success: function(response) {
                        console.log(response); // Debug server response
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            parentItem.remove();
                            if ($('#queue-list .queue-item').length === 0) {
                                $('#queue-list').html('<p>No songs in the queue.</p>');
                            }
                        } else {
                            alert('Error removing song: ' + result.message);
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
