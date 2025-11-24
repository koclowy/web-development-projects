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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Image Slider</title>
    <link rel="stylesheet" href="/Web Application Programming/CSS/artistPage.css" />
    
  </head>
  
  <body>
    <!-- Header -->
    <div class="header">
        <?php include 'header.php'; ?>
    </div>

    <!-- All Artists Container -->
    <section class="slider-container">
        <div class="slider-images">
            <div class="slider-img" onclick="showArtistBtn(this)">
                <img src="/Web Application Programming/image/artistPage/JojiProfile.jpg" alt="1" />
                <h1>Joji</h1>
                <div class="details">
                    <h2>joji</h2>
                    <a href="joji.php" class="artist-btn">Check Out the Artist</a>
                </div>
            </div>
            <div class="slider-img" onclick="showArtistBtn(this)">
                <img src="/Web Application Programming/image/artistPage/GracieProfile.webp" alt="2" />
                <h1>gracie</h1>
                <div class="details">
                    <h2>gracie abrams</h2>
                    <a href="gracie.php" class="artist-btn">Check Out the Artist</a>
                </div>
            </div>
            <div class="slider-img" onclick="showArtistBtn(this)">
                <img src="/Web Application Programming/image/artistPage/NewJeansProfile.jpg" alt="3" />
                <h1>nwjns</h1>
                <div class="details">
                    <h2>new jeans</h2>
                    <a href="njeans.php" class="artist-btn">Check Out the Artist</a>
                </div>
            </div>
            <div class="slider-img" onclick="showArtistBtn(this)">
                <img src="/Web Application Programming/image/artistPage/DanielCaesarProfile.jpg" alt="4" />
                <h1>daniel</h1>
                <div class="details">
                    <h2>daniel caesar</h2>
                    <a href="danielcsr.php" class="artist-btn">Check Out the Artist</a>
                </div>
            </div>
            <div class="slider-img" onclick="showArtistBtn(this)">
                <img src="/Web Application Programming/image/artistPage/BillieEilishProfile.webp" alt="5" />
                <h1>billie</h1>
                <div class="details">
                    <h2>billie eilish</h2>
                    <a href="billie.php" class="artist-btn">Check Out the Artist</a>
                </div>
            </div>
            <div class="slider-img" onclick="showArtistBtn(this)">
                <img src="/Web Application Programming/image/artistPage/TaylorSwiftProfile.webp" alt="6" />
                <h1>taylor</h1>
                <div class="details">
                    <h2>taylor swift</h2>
                    <a href="#" class="artist-btn">Check Out the Artist</a>
                </div>
            </div>
            <div class="slider-img" onclick="showArtistBtn(this)">
                <img src="/Web Application Programming/image/artistPage/DrakeProfile.jpg" alt="7" />
                <h1>drake</h1>
                <div class="details">
                    <h2>drake</h2>
                    <a href="#" class="artist-btn">Check Out the Artist</a>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    
    <!-- Footer -->
    <div class="footer">
        <?php include('songFooter.php'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/Web Application Programming/javascript/artistPage.js"></script>
    <script src="/Web Application Programming/javascript/songPage.js"></script>
    <script src="/Web Application Programming/javascript/songList.js"></script>
  </body>
</html>
