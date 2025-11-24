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
<html>

<head>
    <link rel="stylesheet" href="/Web Application Programming/CSS/discoveryPage.css">
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <?php include 'header.php'; ?>
    </div>

    <br>
    <br>
    <br>
    <br>
    <div class="searchbar-container">
        <form action="https://www.google.com/search" class="search" id="search-bar">
            <input type="search" placeholder="Type something..." name="q" class="search__input">

            <div class="search__button" id="search-button">
                <i class="ri-search-2-line search__icon"></i>
                <i class="ri-close-line search__close"></i>
            </div>
        </form>
    </div>
    <br>
    <h3> Recommended Artist </h3>
    <br>
    <br>
    <div class="aboutArtist-container">
        <div class="item">
            <div class="artist">
                <a href="#joji"> <!-- link to joji in artist page -->
                    <img src="/Web Application Programming/image/discoveryPage/joji profile c.jpg" height="320">
                </a>
            </div>
            <p> Joji </p>
            <p> 4 Albums | 50 Songs </p>
        </div>

        <div class="item">
            <div class="artist">
                <a href="#gracie">
                    <img src="/Web Application Programming/image/discoveryPage/GracieAbrams profile c.jpg" height="320">
                </a>
            </div>
            <p> Gracie Abrams </p>
            <p> 4 Albums | 174 Songs </p>
        </div>

        <div class="item">
            <!-- <h1>Slide 3</h1> -->
            <div class="artist">
                <a href="#nj">
                    <img src="/Web Application Programming/image/discoveryPage/newjeans profile.jpg" height="320">
                </a>
            </div>
            <p> New Jeans </p>
            <p> 5 Albums | 37 Songs </p>
        </div>

        <div class="item">
            <div class="artist">
                <a href="#daniel">
                    <img src="/Web Application Programming/image/discoveryPage/DanielCaesar profile.jpeg" height="320">
                </a>
            </div>
            <p> Daniel Caesar </p>
            <p> 5 Albums | 54 Songs </p>
        </div>

        <div class="item">
            <div class="artist">
                <a href="#billie">
                    <img src="/Web Application Programming/image/discoveryPage/BillieEilish profile.jpg" height="320">
                </a>
            </div>
            <p> Billie Eilish </p>
            <p> 7 Albums | 70 Songs </p>
        </div>

        <button id="next">></button>
        <button id="prev"><</button>
    </div>

    <!-- button to check available songs -->
    <a href="/Web Application Programming/php/songList.php" class="button-class">Check available songs</a>


    <div class="footer">
        <?php include('songFooter.php'); ?>
    </div>


    <script src="/Web Application Programming/javascript/searchbar.js"></script>
    <script src="/Web Application Programming/javascript/songPage.js"></script>
    <script src="/Web Application Programming/javascript/songList.js"></script>

</body>

</html>