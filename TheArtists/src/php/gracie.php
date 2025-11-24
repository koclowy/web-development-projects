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
    <title>MeloVerse - Gracie Abrams</title>
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
        <img src="/Web Application Programming/image/artistPage/gracieabrams.jpg" alt="Gracie Abrams" class="artist-image">
        <div class="artist-details">
            <p>
                Gracie’s introspective songwriting and delicate melodies shine in tracks like <em>I Miss You, I’m Sorry</em> and <em>Feels Like</em>, solidifying her as a rising star in indie-pop.
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
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/2tsou.jpg');">
                <div class="content">
                    <div class="name">The Secret of Us</div>
                    <div class="des">The deluxe version of The Secret of Us expands on Joji's introspective and melancholic themes with additional tracks, deepening his exploration of love, regret, and self-discovery.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/2minor.jpg');">
                <div class="content">
                    <div class="name">Minor</div>
                    <div class="des">This EP features Joji’s signature blend of lo-fi, alternative R&B, and experimental pop, capturing his raw emotional depth. Minor focuses on personal reflections, melancholy, and vulnerability in his songwriting.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/2gr.jpg');">
                <div class="content">
                    <div class="name">Good Riddance</div>
                    <div class="des">The deluxe edition includes extra tracks that further showcase Joji’s emotional range. The album is a melancholic exploration of heartbreak, introspection, and the passing of time.</div>
                </div>
            </div>
            <div class="item" style="background-image: url('/Web Application Programming/image/artistPage/2tiwifl.jpg');">
                <div class="content">
                    <div class="name">This is What it Feels Like</div>
                    <div class="des">Gracie's soft yet impactful voice and minimalist production create a raw and intimate atmosphere, allowing her to connect with her audience on a deeply personal level.</div>
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
                <img src="/Web Application Programming/image/artistPage/2tsou.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">I Love You, I'm Sorr</span>
                <span class="duration">3:45</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/2tsou.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">That's So True</span>
                <span class="duration">4:10</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/2tsou.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">Close to You</span>
                <span class="duration">3:20</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/2minor.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">I miss you, I'm sorry</span>
                <span class="duration">4:50</span>
                <button class="like-button"></button>
            </li>
            <li>
                <img src="/Web Application Programming/image/artistPage/2gr.jpg" alt="Album Icon" class="album-icon">
                <span class="song-name">I know it won't work</span>
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
        <p>Click <a href="https://shop.gracieabrams.com/?srsltid=AfmBOoq_Nd5FHatl12Pn2EhkUjEdyv_XcMzQiGEUNqmjVLg00ZDRNah-" target="_blank">HERE</a> to purchase Gracie Abrams merch.</p>
        <div class="merch-grid">

            <!-- Example Merch Item -->
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/gracie merch1.jpg" alt="Digital Album">
                <h3>The Secret of Us Digital Album</h3>
                <p>RM178.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/gracie merch2.jpg" alt="FGAY Sweatshirt">
                <h3>Felt Good About You Sweatshirt</h3>
                <p>RM290.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/gracie merch3.jpg" alt="Be Risky Totebag">
                <h3>Be Risky Totebag</h3>
                <p>RM133.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/gracie merch4.jpg" alt="Deluxe Album">
                <h3>The Secret of Us Deluxe Album</h3>
                <p>RM178.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/gracie merch5.jpg" alt="Beanie">
                <h3>Striped Benie</h3>
                <p>RM178.00</p>
            </div>
            <div class="merch-item">
                <img src="/Web Application Programming/image/artistPage/gracie merch6.jpg" alt="Slip Mat">
                <h3>Slip Mat</h3>
                <p>RM111.00</p>
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