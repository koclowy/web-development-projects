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
    <title>MeloVerse - Billie Eilish</title>
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
        <img src="/Web Application Programming/image/artistPage/billieeilish.jpg" alt="Billie Eilish" class="artist-image">
        <div class="artist-details">
            <h1>Billie Eilish</h1>
            <p>
                With haunting vocals and genre-defying tracks like <em>Bad Guy</em> and <em>Happier Than Ever</em>, Billie is a Grammy-winning icon who reshapes pop with dark, moody, and introspective themes. </p>
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
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/5hte.jpg');">
                <div class="content">
                    <div class="name">Happier Than Ever</div>
                    <div class="des">A bold, introspective album diving into fame, relationships, and personal growth, blending various genres with Billie's signature sound.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/5hmhs.jpg');">
                <div class="content">
                    <div class="name">Hit me Hard and Soft</div>
                    <div class="des">A raw, experimental project featuring emotional depth and a mix of haunting and soothing melodies.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/5wwafa.jpg');">
                <div class="content">
                    <div class="name">When We All Fall Asleep, Where Do We Go ?</div>
                    <div class="des">Her debut album, a dark, genre-defying masterpiece exploring dreams, fears, and teenage struggles.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/5dsam.jpg');">
                <div class="content">
                    <div class="name">Don't Smile At Me</div>
                    <div class="des">A breakout EP filled with moody, catchy tracks that introduced Billie’s unique voice and emotional lyricism to the world.</div>
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
                <img src="/Web Application Programming/image/artistPage/5hte.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Happier Than Ever</span>
                <span class="duration">3:45</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/5hmhs.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">WILDFLOWER</span>
                <span class="duration">4:10</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/5wwafa.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">when the party's over</span>
                <span class="duration">3:20</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/5wwafa.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">bury a friend</span>
                <span class="duration">4:50</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/5hmhs.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">L'AMOUR DE MA VIE</span>
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
        <p>Click <a href="https://store.billieeilish.com/" target="_blank">HERE</a> to purchase Billie Eilish merch.</p>
        <div class="merch-grid">
            <!-- Example Merch Item -->
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/billie merch1.jpg" alt="Hoodie">
                <h3>Hit Me Hard and Soft Hoodie</h3>
                <p>RM445.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/billie merch2.jpg" alt="Tank">
                <h3>All Over Billie Tank</h3>
                <p>RM230.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/billie merch3.jpg" alt="">
                <h3>Get Involved Red Tour Hoodie</h3>
                <p>RM445.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/billie merch4.jpg" alt="Beanie">
                <h3>Racer Green Beanie</h3>
                <p>RM187.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/billie merch5.jpg" alt="Vinyl">
                <h3>Dont Smile at Me Vinyl</h3>
                <p>RM180.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/billie merch6.jpg" alt="Lunchbox">
                <h3>Lunchbox and Thermos Set</h3>
                <p>RM352.00</p>
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