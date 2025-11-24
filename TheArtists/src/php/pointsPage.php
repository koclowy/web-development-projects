<?php
// Database connection
session_start();

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Points Progress Tracker</title>
  <link rel="stylesheet" href="/Web Application Programming/CSS/pointsPage.css">
  <link rel="stylesheet" href="/Web Application Programming/CSS/songFooter.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="navBar">
    <?php include('header.php'); ?>
  </div>
  <div class="container">
    <!-- Header Section -->
    <div class="header">
      <br>
      <br>
      <br>
      <h1>Total Points <br>
        <span id="totalPoints">0</span>
      </h1>
      <hr class="custom-hr">
      <div class="total-points">
        <span>Earn star coins to increase your points and redeem exclusive rewards!</span>
      </div>
    </div>

    <!-- Daily Star Coins Section -->
    <div class="daily-stars">
      <br>
      <h2>Daily Star Coins</h2>
      <br>
      <div class="days-wrapper">
        <!-- Days will be generated dynamically by JavaScript -->
      </div>
    </div>

    <!-- Claim Button -->
    <div class="text-center">
      <button id="claimBtn" class="btn btn-primary">Claim</button>
      <h2>Claim your free star coin today!</h2>
    </div>
    <br>
    <hr class="custom-hr">

    <!-- Reward List -->
    <div class="reward-list">
      <br>
      <h2>Reward List</h2>
      <br>
      <div class="row">
        <div class="col-md-4">
          <div class="reward-item">
            <p>Free Music Download</p>
            <span>100 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>

          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Free 1-Day Premium</p>
            <span>200 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Exclusive Sticker Pack</p>
            <span>300 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Access to Ad-Free Mode (3 Days)</p>
            <span>400 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Exclusive Merchandise Discount</p>
            <span>500 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Free Concert Ticket (Local Events)</p>
            <span>750 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Gift Card for Popular Stores</p>
            <span>1000 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Custom Playlist Created by Experts</p>
            <span>1200 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Early Access to New Features</p>
            <span>1400 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Exclusive Album Release Access</p>
            <span>1600 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>Signed Merchandise</p>
            <span>1800 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="reward-item">
            <p>VIP Pass to Exclusive Music Events</p>
            <span>2000 points</span>
            <br><br>
            <button id="claimBtn" class="btn btn-primary" disabled>Redeem</button>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>

  <div class="footer">
    <?php include('songFooter.php'); ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/Web Application Programming/javascript/pointsPage.js"></script>
  <script src="/Web Application Programming/javascript/songList.js"></script>
  <script src="/Web Application Programming/javascript/songPage.js"></script>
</body>

</html>