<!-- Login Error pops up when try to log in -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Web Application Programming/CSS/loginPage.css">
    <link rel="stylesheet" href="/Web Application Programming/CSS/loginCarousel.css">

    <title>Login Error</title>
</head>

<body>
    <!-- Name and Logo -->
    <h1 class="name">meloverse</h1>
    <img src="/Web Application Programming/image/loginsignupPage/logodisk.png" alt="" class="logo">

    <!-- Display the error message -->
    <div class="container">
        <div class="box form-box">
            <?php
            echo "<div class='message'>
            <p>Wrong Username or Password. Please try again!</p>
             </div> <br>";
            echo "<a href='loginPage.php'><button class='btn'>Go Back</button>";
            ?>
        </div>
    </div>

    <!-- Carousel Container -->
    <div class="carousel-wrapper">
        <!-- Carousel 1 -->
        <div class="carousel">
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Billie-Eilish-Hit-Me-Hard-and-Soft.webp" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/daniel.jpg" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Gracie Abrams 3.webp" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/joji 1.png" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/newjeans.jpg" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Taylor_Swift_-_Folklore.png" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Take_Me_Home_by_One_Direction.png" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/sabrina carpenter.webp" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Coldplay.jpg" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/halsey.webp" alt="" width="330" height="420">
            </div>
        </div>
        <!-- Carousel 2 -->
        <div class="carousel2">
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/BrunoMars.png" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Charlie Puth.jpg" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Ed Sheeran.png" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Giveon.jpg" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Katy Perry.jpg" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Lana Del Ray.jpg" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Rihanna.webp" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/Shawn Mendes.avif" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/TheChainsmokers.jpg" alt="" width="330" height="420">
            </div>
            <div class="img"><img src="/Web Application Programming/image/loginsignupPage/theWeeknd.png" alt="" width="330" height="420">
            </div>
        </div>
    </div>
</body>
</html>