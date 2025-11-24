<!--login page-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Web Application Programming/CSS/loginPage.css">
    <link rel="stylesheet" href="/Web Application Programming/CSS/loginCarousel.css">
    <title>Login</title>
</head>

<body>
    <!-- Name and Logo -->
    <h1 class="name">meloverse</h1>
    <img src="/Web Application Programming/image/loginsignupPage/logodisk.png" alt="" class="logo">

    <!--PHP-->
    <div class="container">
        <div class="box form-box">
            <?php
            include("connect.php");
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Use prepared statements for secure database queries
                $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ? AND Password = ?");
                $stmt->bind_param("ss", $email, $password);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                if ($row) {
                    // Store user data in the session with sanitization
                    $_SESSION['valid'] = htmlspecialchars($row['Email']);
                    $_SESSION['fname'] = htmlspecialchars($row['fName']);
                    $_SESSION['lname'] = htmlspecialchars($row['lName']);
                    $_SESSION['phoneno'] = htmlspecialchars($row['PhoneNo']);
                    $_SESSION['id'] = htmlspecialchars($row['Id']);

                    header("Location: homePage.php"); // Redirect to the homepage
                    exit();
                } else {
                    header("Location: loginError.php"); // Redirect to error page
                    exit();
                }
            } else {
            ?>
                <!-- HTML Form -->
                <header>Login to Meloverse</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    <div class="links">
                        Don't have account? <a href="signinPage.php">Sign Up Now</a>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>

    <!-- 3D Carousel -->
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