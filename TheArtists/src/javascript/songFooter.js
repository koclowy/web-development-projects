document.addEventListener("DOMContentLoaded", () => {
    const playBtn = document.getElementById("playBtn");
    const pauseBtn = document.getElementById("pauseBtn");
    const progressBar = document.getElementById("progressBar");
    const progressFill = document.querySelector(".progress-fill");
    const currentTime = document.getElementById("current-time");
    const duration = document.getElementById("duration");
    const audioPlayer = document.getElementById("audioPlayer");
    const volumeSlider = document.getElementById("volumeSlider");

    // Check if there's a saved time in sessionStorage when the page loads
    const savedTime = sessionStorage.getItem('savedTime');
    const isPlaying = sessionStorage.getItem('isPlaying') === 'true';  // Check if it was previously playing

    if (savedTime) {
        audioPlayer.currentTime = savedTime;
    }

    // If the song was playing, resume playing automatically
    if (isPlaying) {
        audioPlayer.play();
    }

    if (isPlaying) {
        playBtn.style.display = "none"; // Hide the play button
        pauseBtn.style.display = "inline-block"; // Show the pause button
    } else {
        playBtn.style.display = "inline-block"; // Show the play button
        pauseBtn.style.display = "none"; // Hide the pause button
    }

    // Play button functionality
    playBtn.addEventListener("click", () => {
        audioPlayer.play();
        sessionStorage.setItem('isPlaying', 'true');
        playBtn.style.display = "none";
        pauseBtn.style.display = "inline-block";
    });

    // Pause button functionality
    pauseBtn.addEventListener("click", () => {
        audioPlayer.pause();
        sessionStorage.setItem('isPlaying', 'false');
        playBtn.style.display = "inline-block";
        pauseBtn.style.display = "none";
    });

    // Update progress bar during playback
    audioPlayer.addEventListener("timeupdate", () => {
        const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        progressFill.style.width = `${progress}%`;

        // Update time displays
        currentTime.textContent = formatTime(audioPlayer.currentTime);
        duration.textContent = formatTime(audioPlayer.duration || 0); // Handle NaN if no metadata

        // Save the current playback time to sessionStorage
        sessionStorage.setItem('savedTime', audioPlayer.currentTime);
    });

    // Seek functionality
    progressBar.addEventListener("click", (e) => {
        const barWidth = progressBar.offsetWidth;
        const clickX = e.offsetX;
        const newTime = (clickX / barWidth) * audioPlayer.duration;
        audioPlayer.currentTime = newTime;
    });

    // Format time in mm:ss
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? "0" : ""}${secs}`;
    }

    // Set initial volume
    audioPlayer.volume = volumeSlider.value;
    updateSliderBackground(volumeSlider);

    // Update audio volume and background gradient on slider input
    volumeSlider.addEventListener("input", () => {
        audioPlayer.volume = volumeSlider.value;
        updateSliderBackground(volumeSlider);
    });

    // Function to update the slider's background gradient
    function updateSliderBackground(slider) {
        const value = slider.value * 100; // Convert value to percentage
        slider.style.background = `linear-gradient(to right, #ffffff ${value}%, #535353 ${value}%)`;
    }

    // Save the current time when the page is unloaded (e.g., when navigating away)
    window.addEventListener('beforeunload', () => {
        sessionStorage.setItem('savedTime', audioPlayer.currentTime);
    });
});
