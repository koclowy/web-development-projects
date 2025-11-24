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

$current_song = isset($_SESSION['current_song']) ? $_SESSION['current_song'] : null;
$is_playing = isset($_SESSION['is_playing']) ? $_SESSION['is_playing'] : false;
$conn->close();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeloVerse - Joji</title>
    <link rel="stylesheet" href="/Web Application Programming/CSS/artistPage.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="header">
        <?php include 'header.php'; ?>
    </div>

    <!-- Back Button -->
    <button id="backBtn" class="back-btn">Back to Artists Page</button>

    <!-- Artist Info Section -->
    <section class="artist-info">
        <img src="/Web Application Programming/image/artistPage/joji.png" alt="Joji" class="artist-image">
        <div class="artist-details">
            <p>
                A genre-blending artist known for his soulful vocals and emotional lyrics, Joji captivates fans with hits like <em>Glimpse of Us</em> and <em>Sanctuary</em>, bridging pop and R&B with experimental sounds.
            </p>
            <div class="artist-buttons">
                <button>Follow</button>
                <button>Favourite</button>
            </div>
        </div>
    </section>

    <!-- Album and Songs Section -->
    <div class="container">
        <h2>Albums and Songs</h2>
        <div class="slide">
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/1ballad.jpg');">
                <div class="content">
                    <div class="name">Ballads 1</div>
                    <div class="des">Joji’s debut album merges lo-fi, trap, and R&B, filled with soulful vocals and emotional ballads. Ballads 1 introduced Joji’s unique sound, exploring themes of loneliness, heartbreak, and vulnerability.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/1nectar.jpg');">
                <div class="content">
                    <div class="name">Nectar</div>
                    <div class="des">A mix of experimental pop and electronic, Nectar features a range of melancholic yet catchy tracks. Joji delves into love, loss, and personal struggles, with collaborations that add depth to his evolving sound.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/1smithereens.jpg');">
                <div class="content">
                    <div class="name">SMITHEREENS</div>
                    <div class="des">This album blends lo-fi, R&B, and alternative pop with introspective lyrics. Joji explores themes of heartbreak, self-reflection, and emotional vulnerability, showcasing his evolution as a versatile artist.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/1intongue.jpg');">
                <div class="content">
                    <div class="name">In Tongues</div>
                    <div class="des">This is Joji's debut EP. The album blends elements of lo-fi, R&B, and electronic music, featuring introspective lyrics that explore themes of heartbreak, self-doubt, and emotional vulnerability.</div>
                </div>
            </div>
        </div>
        <div class="button">
            <button class="prev">
                <<i class="fa-solid fa-arrow-left"></i>
            </button>
            <button class="next">><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>

    <br>
    <br>
    <br>
    <!-- Playlist Section -->
    <div class="playlist">
        <h2>Tracks</h2>
        <ul class="playlist-list">
            <li>
                <img src="/Web Application Programming/image/artistPage/1smithereens.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Die For You</span>
                <span class="duration">3:45</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/1smithereens.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Glimpse of Us</span>
                <span class="duration">4:10</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/1nectar.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Sanctuary</span>
                <span class="duration">3:20</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/1nectar.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Run</span>
                <span class="duration">4:50</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/1ballad.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">SLOW DANCING IN THE DARK</span>
                <span class="duration">4:50</span>
                <button class="like-button"></button>
            </li>
        </ul>
        <br>
        <a href="/Web Application Programming/php/songList.php" class="listen-now-button">Listen Now</a>
    </div>

    <!-- Merchandise Section -->
    <section class="merchandise">
        <h2>Merchandise</h2>
        <br>
        <p>Click <a href="https://shop.jojimusic.com/?srsltid=AfmBOooDbSRgAM_oZ6d1r-4HVg1IBSco1xB-JkYoPqOupQlaUrD7EBr1" target="_blank">HERE</a> to purchase Joji merch.</p>
        <div class="merch-grid">
            <!-- Example Merch Item -->
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/joji merch1.jpg" alt="Black Tour Tee">
                <h3>SMITHEREENS Black Tour Tee</h3>
                <p>RM181.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/joji merch2.jpg" alt="Black Tour Dates Tee">
                <h3>SMITHEREENS Black Tour Dates Tee</h3>
                <p>RM113.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/joji merch3.jpg" alt="Intangible Hoodie">
                <h3>SMITHEREENS Intangible Hoodie</h3>
                <p>RM294.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/joji merch4.jpg" alt="BLIVION Totebag">
                <h3>OBLIVION Totebag</h3>
                <p>RM133.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/joji merch5.jpg" alt="Ballads 1 Vinyl">
                <h3>Ballads 1 Vinyl</h3>
                <p>RM249.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/joji merch6.jpg" alt="Ballads 1 Poster">
                <h3>Ballads 1 Poster</h3>
                <p>RM133.00</p>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    
    <div class="footer">
        <?php include('songFooter.php'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/Web Application Programming/javascript/artistPage.js" defer></script>
    <script src="/Web Application Programming/javascript/songPage.js"></script>
    <script src="/Web Application Programming/javascript/songList.js"></script>
</body>

</html>