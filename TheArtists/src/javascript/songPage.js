// Function to create waveform bars dynamically
function createWaveformBars() {
    const barCount = 15;  // Number of bars in the waveform
    for (let i = 0; i < barCount; i++) {
        const bar = document.createElement("div");
        bar.classList.add("bar");
        waveform.appendChild(bar);  // Append each bar to the waveform container
    }
}

// Function to animate bars with a steady bounce
function animateBars() {
    const bars = document.querySelectorAll(".bar");

    setInterval(() => {
        bars.forEach((bar) => {
            // Generate a random height for the bounce
            const randomHeight = Math.random() * (Math.random() > 0.5 ? 150 : 50); // Bounce heights (either 50% or 100%)

            // Apply the height to each bar
            bar.style.height = `${randomHeight}%`;

            // Apply transition for smooth bounce
            const randomSpeed = Math.random() * 0.1 + 0.2; // Slower speeds for smoother bounce
            bar.style.transition = `height ${randomSpeed}s ease`;
        });
    }, 150); // Update every 150ms for subtle bounce
}

// Initialize waveform and queue on page load
createWaveformBars();
animateBars();



// song.js
function addToQueue(songId) {
    // Show a loading message or something to indicate the action
    console.log("Attempting to add song ID " + songId + " to queue");

    // Perform an AJAX request to the server to handle the add-to-queue action
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "queue_handler.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "success") {
                console.log("Song added to queue successfully!");
                // Optionally update UI or give feedback to the user
            } else {
                console.log("Failed to add song to queue: " + response);
            }
        }
    };

    // Send the songId to queue_handler.php
    xhr.send("action=add_to_queue&song_id=" + songId);
}

function removeFromQueue(queueId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "remove_from_queue.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log("Response: ", xhr.responseText);
            if (xhr.status === 200 && xhr.responseText === "success") {
                console.log("Song removed from queue successfully!");
                location.reload();
            } else {
                console.log("Failed to remove song from queue: ", xhr.responseText);
            }
        }
    };
    xhr.send("action=remove_from_queue&queue_id=" + queueId);
}

$('.queue-item').on('click', function () {
    const filePath = $(this).data('file_path');
    const audioPlayer = $('#audioPlayer')[0];
    $('#audioSource').attr('src', filePath);
    audioPlayer.load();
    audioPlayer.play();

    // Highlight the active song
    $('.queue-item').removeClass('playing');
    $(this).addClass('playing');
});

