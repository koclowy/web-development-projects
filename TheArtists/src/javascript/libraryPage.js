$(document).ready(function () {
    // Handle like button click
    $('.likeBtn').on('click', function (e) {
        e.preventDefault(); // Prevent the button's default behavior
        const songId = $(this).data('song-id');

        // AJAX request to like the song
        $.ajax({
            url: '/Web Application Programming/php/likedSong_handler.php',
            type: 'POST',
            data: { song_id: songId },
            success: function () {
                // Optionally update the UI or display a subtle message
                console.log('Song liked successfully.');
            },
            error: function () {
                console.error('Error liking the song.');
            }
        });
    });

    // Handle song click
    $('.queue-item').on('click', function () {
        const songId = $(this).data('song-id');
        parent.location.href = `/Web Application Programming/php/songPage.php?song_id=${songId}`;
    });

    // Handle remove button click
    $('.remove-button').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation(); // Prevent the parent queue-item click event
        const queueId = $(this).data('id');
        const parentItem = $(this).closest('.queue-item');

        // AJAX request to remove the song
        $.ajax({
            url: '/Web Application Programming/php/likedSong_display.php',
            type: 'POST',
            data: { remove_id: queueId },
            success: function (response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    parentItem.remove();
                    if ($('#queue-list .queue-item').length === 0) {
                        $('#queue-list').html('<p>No songs in the queue.</p>');
                    }
                } else {
                    console.error('Error removing song: ' + result.message);
                }
            },
            error: function () {
                console.error('An error occurred while removing the song.');
            }
        });
    });
});

$(document).ready(function () {
    // Handle like button click
    $('.likeBtn').on('click', function (e) {
        e.preventDefault(); // Prevent the button's default behavior
        const songId = $(this).data('song-id');

        // AJAX request to like the song
        $.ajax({
            url: '/Web Application Programming/php/likedSong_handler.php',
            type: 'POST',
            data: { song_id: songId },
            success: function () {
                // Optionally update the UI or display a subtle message
                console.log('Song liked successfully.');
            },
            error: function () {
                console.error('Error liking the song.');
            }
        });
    });

    // Handle song click
    $('.queue-item').on('click', function () {
        const songId = $(this).data('song-id');
        parent.location.href = `/Web Application Programming/php/songPage.php?song_id=${songId}`;
    });

    // Handle remove button click
    $('.remove-button').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation(); // Prevent the parent queue-item click event
        const queueId = $(this).data('id');
        const parentItem = $(this).closest('.queue-item');

        // AJAX request to remove the song
        $.ajax({
            url: '/Web Application Programming/php/playlist_display.php',
            type: 'POST',
            data: { remove_id: queueId },
            success: function (response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    parentItem.remove();
                    if ($('#queue-list .queue-item').length === 0) {
                        $('#queue-list').html('<p>No songs in the queue.</p>');
                    }
                } else {
                    console.error('Error removing song: ' + result.message);
                }
            },
            error: function () {
                console.error('An error occurred while removing the song.');
            }
        });
    });
});

function likeSong(songId) {
    fetch('/Web Application Programming/php/likedSong_handler.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `song_id=${songId}`
    })
}

function addToPlaylist(songId) {
    fetch('/Web Application Programming/php/playlist_handler.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `song_id=${songId}`
    })
}

document.querySelectorAll(".add-to-fav").forEach(button => {
    button.addEventListener("click", function () {
        const artistId = this.getAttribute("data-id");

        fetch("add_to_favourite.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ artist_id: artistId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Check if the artist is already displayed
                const favouriteList = document.querySelector(".favourite-list");
                if (!favouriteList.querySelector(`[data-id='${artistId}']`)) {
                    // Get artist details from the button's parent (e.g., name and image)
                    const artistCard = this.closest(".artist-card");
                    const artistName = artistCard.querySelector("h3").textContent;
                    const artistImage = artistCard.querySelector("img").src;

                    // Create a new artist card for the favourite section
                    const newCard = document.createElement("div");
                    newCard.className = "artist-card";
                    newCard.innerHTML = `
                        <img src="${artistImage}" alt="Profile Picture">
                        <h3>${artistName}</h3>
                        <button class="remove-from-fav" data-id="${artistId}">Remove</button>
                    `;

                    // Append the new card to the favourite list
                    favouriteList.appendChild(newCard);

                    // Attach remove functionality
                    newCard.querySelector(".remove-from-fav").addEventListener("click", function () {
                        const artistId = this.getAttribute("data-id");

                        fetch("remove_from_favourite.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ artist_id: artistId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.closest(".artist-card").remove();
                            }
                        });
                    });
                }
            }
        });
    });
});