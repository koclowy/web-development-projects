<?php
// Database connection
$conn = new mysqli("localhost:3307", "root", "", "login");
if ($conn->connect_error) {
    die("Failed to connect DB: " . $conn->connect_error);
}

// Fetch favourite artists
$favourites = $conn->query("
    SELECT artists.* 
    FROM favourites 
    INNER JOIN artists ON favourites.artist_id = artists.id
");

if ($favourites->num_rows > 0):
    while ($fav = $favourites->fetch_assoc()): ?>
        <div class="artist-card">
            <img src="<?php echo $fav['profile_picture']; ?>" alt="Profile Picture">
            <h3><?php echo $fav['name']; ?></h3>
            <button class="remove-from-fav" data-id="<?php echo $fav['id']; ?>">Remove</button>
        </div>
    <?php endwhile; 
else: ?>
    <p>No favourite artists yet.</p>
<?php endif;

$conn->close();
?>