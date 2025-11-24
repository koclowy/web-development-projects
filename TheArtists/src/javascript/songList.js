// Check if a song is being played from sessionStorage
window.addEventListener('DOMContentLoaded', () => {
    const audioPlayer = document.getElementById("audioPlayer");
    const playBtn = document.getElementById("playBtn");
    const pauseBtn = document.getElementById("pauseBtn");

    // Retrieve current song state from sessionStorage
    const currentSongId = sessionStorage.getItem('currentSongId');
    const isPlaying = sessionStorage.getItem('isPlaying') === 'true';

    // Auto play the audio if a song is set to be playing
    if (currentSongId && isPlaying) {
        audioPlayer.play();
        playBtn.style.display = 'none';
        pauseBtn.style.display = 'inline-block';
    } else {
        playBtn.style.display = 'inline-block';
        pauseBtn.style.display = 'none';
    }

    // Play button functionality
    playBtn.addEventListener("click", () => {
        audioPlayer.play();
        playBtn.style.display = 'none';
        pauseBtn.style.display = 'inline-block';
        sessionStorage.setItem('isPlaying', 'true');
    });

    // Pause button functionality
    pauseBtn.addEventListener("click", () => {
        audioPlayer.pause();
        playBtn.style.display = 'inline-block';
        pauseBtn.style.display = 'none';
        sessionStorage.setItem('isPlaying', 'false');
    });
});
