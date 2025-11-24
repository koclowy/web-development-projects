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
    <title>MeloVerse - New Jeans</title>
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
        <img src="/Web Application Programming/image/artistPage/newjeans.jpg" alt="New Jeans" class="artist-image">
        <div class="artist-details">
            <h1>New Jeans</h1>
            <p>
                This K-pop group dazzles with their fresh sound and stylish visuals. Known for hits like
                <em>Attention</em> and <em>Ditto</em>, New Jeans redefines the genre with youthful energy
                and innovative concepts.
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
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/3ditto.jpg');">
                <div class="content">
                    <div class="name">Ditto</div>
                    <div class="des">A reflective and emotional single with soft, dreamy vocals layered over a rhythmic beat, showcasing a sentimental side of New Jeans.
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/3nj.jpg');">
                <div class="content">
                    <div class="name">New Jeans</div>
                    <div class="des">Their debut release, featuring fresh sounds and innovative concepts that redefine K-pop, gaining massive acclaim for its originality.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/3omg.jpg');">
                <div class="content">
                    <div class="name">OMG</div>
                    <div class="des">A vibrant and catchy album that highlights New Jeans' playful yet sophisticated take on K-pop, blending modern beats with nostalgic melodies.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/3hwbg.jpg');">
                <div class="content">
                    <div class="name">How Sweet</div>
                    <div class="des">A yet-to-be-released or upcoming track expected to continue their streak of sweet and innovative music (subject to more details).</div>
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
                <img src="/Web Application Programming/image/artistPage/3nj.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Hype Boy</span>
                <span class="duration">3:45</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/3nj.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Cookie</span>
                <span class="duration">4:10</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/3nj.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Attention</span>
                <span class="duration">3:20</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/3omg.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">OMG</span>
                <span class="duration">4:50</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/3ditto.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Ditto</span>
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
        <p>Click <a href="https://shop.weverse.io/en/shop/GL_KRW/artists/82/categories/1134" target="_blank">HERE</a> to purchase New Jeans merch.</p>
        <div class="merch-grid">
            <!-- Example Merch Item -->
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/nj merch1.png" alt="Light Stick">
                <h3>Light Stick</h3>
                <p>RM220.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/nj merch2.png" alt="Charm Set">
                <h3>Charm Set</h3>
                <p>RM66.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/nj merch3.png" alt="Poster">
                <h3>Poster</h3>
                <p>RM30.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/nj merch4.png" alt="Iphone Case">
                <h3>iPhone Case</h3>
                <p>RM70.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/nj merch5.png" alt="MinJi Tee">
                <h3>MinJi Tee</h3>
                <p>RM155.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/nj merch6.png" alt="Photo Set">
                <h3>Photo Set</h3>
                <p>RM60.00</p>
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