<?php
// Include database connection settings
$host = "localhost:3307"; // Adjust if necessary
$user = "root";
$pass = "";
$db = "login"; // Your database name

// Establish database connection
$conn = new mysqli($host, $user, $pass, $db);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the action is set
if (isset($_POST['action']) && $_POST['action'] === 'add_to_queue') {
    // Check if song_id is set and is numeric
    if (isset($_POST['song_id']) && is_numeric($_POST['song_id'])) {
        $songId = intval($_POST['song_id']);
        
        // Check if the song exists in the database (with uppercase 'ID')
        $songCheckStmt = $conn->prepare("SELECT ID FROM songs WHERE ID = ?");
        $songCheckStmt->bind_param("i", $songId);
        $songCheckStmt->execute();
        $songCheckStmt->store_result();

        if ($songCheckStmt->num_rows == 0) {
            echo "Song not found.";
            exit;
        }
        $songCheckStmt->close();

        // Prepare the SQL query to add the song to the queue
        $stmt = $conn->prepare("INSERT INTO queue (song_id) VALUES (?)");
        
        // Check if the query was prepared successfully
        if ($stmt === false) {
            echo "Failed to prepare the SQL statement: " . $conn->error;
            exit;
        }
        
        $stmt->bind_param("i", $songId);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            echo "success"; // Song added to queue successfully
        } else {
            echo "Failed to execute query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid song ID.";
    }
} else {
    echo "Invalid action.";
}

$conn->close();
?>