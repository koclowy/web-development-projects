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
    <link rel="stylesheet" href="/Web Application Programming/CSS/homePage.css">
    <title>Homepage</title>
</head>
<body>
    <div class="header">
        <?php include 'header.php'; ?>
    </div>

    <div class = "carouselcontainer">
    <div class="ring-text">
       <!-- <h3> Popular Albums  </h3> -->
    </div>

    <div class="ring-container">
        <div class="ring">
            <div class="img"><img src="/Web Application Programming/image/landingPage/Joji - Nectar.webp" alt="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/ArianaGrande.jpg" id="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/BillieElish 1.png" alt="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/Gabriela Bee.webp" alt="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/Keshi.png" alt="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/LanaDeyRey.jpg" alt="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/Sza.png" alt="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/Gracie Abrams 2.webp" alt="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/New Jeans.webp" alt="" width="300" height="400">
            </div>
            <div class="img"><img src="/Web Application Programming/image/landingPage/Daniel Caesar.jpg" alt="" width="300" height="400">
            </div>  
        </div>
    </div>
    </div>

    <div class="listento-container">
        <h3> Popular Songs </h3>
        <div class="carousel">
            <div class="card-container">
                <div class="card">
                    <h3> Die With A Smile </h3>
                    <!-- <img src="img/profile-pic.png" class="profile-pic"> -->
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/die with a smile.jpg" alt="" width="200" height="215" >
                    </div>
                </div>
                <div class="card">
                    <h3> APT. </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/apt.jpg" alt="" width="200" height="215" >
                    </div>
                </div>
                <div class="card">
                    <h3> BIRDS OF A FEATHER </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/birds of a feather.jpg" alt="" width="200" height="215" >
                    </div>
                </div>
                <div class="card">
                    <h3> Thats So True </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/thats so true.jpg" alt="" width="200" height="215"" >
                    </div>
                    
                </div>
                <div class="card">
                    <h3> All I Want For Chrismas Is You </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/all i want for chrismas.jpg" alt="" width="200" height="215" >
                    </div>
                </div>
            </div>
        </div>

        <h3> Popular Artists </h3>
        <div class="carousel">
            <div class="card-container">
                <div class="card">
                    <h3> Taylor Swift </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/taylor.jpg" alt="" width="200" height="215" >
                    </div>
                </div>
                <div class="card">
                    <h3> Bruno Mars </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/bruno.jpg" alt="" width="200" height="215" >
                    </div>
                </div>
                <div class="card">
                    <h3> Lady Gaga </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/lady gaga.jpg" alt="" width="200" height="215" >
                    </div>
                </div>
                <div class="card">
                    <h3> The Weekend </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/weekend.jpg" alt="" width="200" height="215" >
                    </div>
                </div>
                <div class="card">
                    <h3> Rose </h3>
                    <div class="listen-img">
                        <img src="/Web Application Programming/image/homePage/rosie.jpg" alt="" width="200" height="215"" >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <?php include('songFooter.php'); ?>
    </div>

    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js'></script>
    <script src='/Web Application Programming/javascript/homePage.js'></script>
    <script src="/Web Application Programming/javascript/songPage.js"></script>
    <script src="/Web Application Programming/javascript/songList.js"></script>

</body>
</html>