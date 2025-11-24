<!-- Footer -->
<?php
// Retrieve current song from session or sessionStorage (or load from database if none)
$current_song = isset($_SESSION['current_song']) ? $_SESSION['current_song'] : null;
$is_playing = isset($_SESSION['is_playing']) ? $_SESSION['is_playing'] : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player Footer</title>
    <link rel="stylesheet" href="/Web Application Programming/CSS/songFooter.css">
</head>

<body>

    <!-- Audio -->
    <audio id="audioPlayer" controls>
        <source id="audioSource" src="<?php echo isset($current_song['file_path']) ? $current_song['file_path'] : ''; ?>" type="audio/mp3">
    </audio>

    <!-- Footer -->
    <div class="footer">
        <!-- Footer Left -->
        <div class="footer-left">
            <?php if ($current_song): ?>
                <div class="album-cover" style="background-image: url('<?php echo htmlspecialchars($current_song['album_art']); ?>');"></div>
                <div class="track-info">
                    <span class="track-title"><?php echo htmlspecialchars($current_song['title']); ?></span>
                    <span class="track-artist"><?php echo htmlspecialchars($current_song['artist']); ?></span>
                </div>
            <?php else: ?>
                <p>No song playing</p>
            <?php endif; ?>
        </div>

        <!-- Footer Center -->
        <div class="footer-center">
            <div class="audio-controls">
                <!-- Play and Pause Buttons -->
                <button id="playBtn" style="display: none;" onclick="togglePlay()">
                    <img src="/Web Application Programming/image/songPage/play_icon.png" alt="Play" />
                </button>
                <button id="pauseBtn" style="display: none;" onclick="togglePause()">
                    <img src="/Web Application Programming/image/songPage/pause_icon.png" alt="Pause" />
                </button>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const playBtn = document.getElementById("playBtn");
                    const pauseBtn = document.getElementById("pauseBtn");
                    const audioPlayer = document.getElementById("audioPlayer");

                    // Restore saved state
                    const isPlaying = sessionStorage.getItem('isPlaying') === 'true';
                    const savedTime = parseFloat(sessionStorage.getItem('savedTime')) || 0;

                    // Set the playback time
                    audioPlayer.currentTime = savedTime;

                    // Update button state and auto-play if necessary
                    if (isPlaying) {
                        audioPlayer.play().then(() => {
                            updateButtonState(true);
                        }).catch((error) => {
                            console.error("Autoplay failed:", error);
                            updateButtonState(false);
                        });
                    } else {
                        updateButtonState(false);
                    }

                    // Event listeners for play and pause buttons
                    playBtn.addEventListener("click", () => {
                        audioPlayer.play();
                        sessionStorage.setItem('isPlaying', 'true');
                        updateButtonState(true);
                    });

                    pauseBtn.addEventListener("click", () => {
                        audioPlayer.pause();
                        sessionStorage.setItem('isPlaying', 'false');
                        updateButtonState(false);
                    });

                    // Save playback time during playback
                    audioPlayer.addEventListener("timeupdate", () => {
                        sessionStorage.setItem('savedTime', audioPlayer.currentTime);
                    });

                    // Helper function to update button state
                    function updateButtonState(isPlaying) {
                        if (isPlaying) {
                            playBtn.style.display = "none";
                            pauseBtn.style.display = "inline-block";
                        } else {
                            playBtn.style.display = "inline-block";
                            pauseBtn.style.display = "none";
                        }
                    }
                });
            </script>
            <div class="progress-container">
                <span id="current-time">0:00</span>
                <div class="progress-bar" id="progressBar">
                    <div class="progress-fill"></div>
                </div>
                <span id="duration">0:00</span>
            </div>

        </div>

        <!-- Footer Right -->
        <div class="footer-right">
            <div class="volume-control">
                <label for="volumeSlider">
                    <img src="/Web Application Programming/image/songPage/volume_icon.png" alt="Volume" />
                </label>
                <input type="range" id="volumeSlider" min="0" max="1" step="0.01" value="0.5">
            </div>
        </div>
    </div>

    <script src="/Web Application Programming/javascript/songFooter.js"></script>
    <script src="/Web Application Programming/javascript/songPage.js"></script>
</body>

</html>