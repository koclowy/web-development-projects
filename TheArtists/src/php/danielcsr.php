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
    <title>MeloVerse - Daniel Caesar</title>
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
        <img src="/Web Application Programming/image/artistPage/danielcaesar.jpg" alt="Daniel Caesar" class="artist-image">
        <div class="artist-details">
            <h1>Daniel caesar</h1>
            <p>
                A soulful R&B artist, Daniel's smooth vocals and poetic lyrics in songs like <em>Best Part</em> and <em>Get You</em> resonate deeply, earning him critical acclaim and global fans. </p>
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
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/4freudian.jpg');">
                <div class="content">
                    <div class="name">Freudian</div>
                    <div class="des">A soulful debut album blending R&B, gospel, and emotional storytelling about love, heartbreak, and self-reflection.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/4jdenim.jpg');">
                <div class="content">
                    <div class="name">Japanese Denim</div>
                    <div class="des">A smooth, timeless ballad about unending love, featuring Caesar’s signature soothing voice and poignant lyrics.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/4never.jpg');">
                <div class="content">
                    <div class="name">Never Enough</div>
                    <div class="des">A compelling exploration of emotional vulnerability and growth, with lush instrumentals and Caesar's heartfelt vocals.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/4pdnl.jpg');">
                <div class="content">
                    <div class="name">Please Do Not Lean</div>
                    <div class="des">A contemplative track featuring introspective lyrics, showcasing Caesar’s vocal finesse and emotional depth.</div>
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
                <img src="/Web Application Programming/image/artistPage/4freudian.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Best Part (feat. HER.)</span>
                <span class="duration">3:45</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/4never.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Always</span>
                <span class="duration">4:10</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/4jdenim.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Japanese Denim</span>
                <span class="duration">3:20</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/4jdenim.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Superpowers</span>
                <span class="duration">4:50</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/4freudian.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Get You (feat. Kali Uchis)</span>
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
        <p>Click <a href="https://shop.danielcaesar.com/?srsltid=AfmBOoplHEamiYTWHowkM0n75Z3Wltg0XKtkZtAya-4bwCuGQApcqqOn" target="_blank">HERE</a> to purchase Daniel Caesar merch.</p>
        <div class="merch-grid">
            <!-- Example Merch Item -->
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/daniel merch1.jpg" alt="Hoodie">
                <h3>look What They Did to Me Baby Hoodie</h3>
                <p>RM512.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/daniel merch2.jpg" alt="Portrait Tee">
                <h3>SUPERPOWER Portrait Tee</h3>
                <p>RM200.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/daniel merch3.jpg" alt="NE 2LP Vinyl">
                <h3>Never Enough 2LP Vinyl</h3>
                <p>RM133.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/daniel merch4.jpg" alt="Freudian Vinyl LP">
                <h3>Limited Edition Freudian Vinyl LP</h3>
                <p>RM480.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/daniel merch5.jpg" alt="NE Shirt">
                <h3>Never Enough T-Shirt</h3>
                <p>RM89.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/daniel merch6.jpg" alt="Case Study 01 CD">
                <h3>Case Study 01 CD</h3>
                <p>RM59.00</p>
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