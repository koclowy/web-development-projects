// Load Navigation Function
function loadNavigation() {
    fetch('navbar.html')
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to load navbar.html');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('navigation-placeholder').innerHTML = data;
        })
        .catch(error => {
            console.error('Navigation loading error:', error);
        });
}

// Back to the Artist Main Page Button
document.addEventListener('DOMContentLoaded', function() {
    
    // Load navigation
    loadNavigation();

    // Back Button
    const backBtn = document.getElementById('backBtn');
    if (backBtn) {
        backBtn.addEventListener('click', function(event) {
            event.preventDefault();  // Prevent default behavior
            window.history.back();   // Go back in the history
        });
    } else {
        console.log("Back button not found.");
    }
});

// Artist Images Slider
$(document).ready(function() {
    $(".slider-img").on("click", function() {
        $(".slider-img").removeClass("active");  // Remove active class
        $(this).addClass("active");  // Add active class to clicked image
    });
});


// Check out Artist button
function showArtistBtn(selectedArtist) {
    // Hide all artist buttons
    const allButtons = document.querySelectorAll('.artist-btn');
    allButtons.forEach(button => {
        button.style.display = 'none';
    });

    // Show the button for the clicked artist
    const buttonToShow = selectedArtist.querySelector('.artist-btn');
    if (buttonToShow) {
        buttonToShow.style.display = 'block';
    }
}

// Artist Buttons (Follow, Favorite)
document.addEventListener("DOMContentLoaded", () => {
    const followButton = document.querySelector(".artist-buttons button:first-child");
    const favoriteButton = document.querySelector(".artist-buttons button:last-child");

    followButton.addEventListener("click", () => {
        alert("You are now following the artist!");
    });

    favoriteButton.addEventListener("click", () => {
        alert("The artist has been added to your favorites!");
    });
});

// Album Carousel (Next and Previous)
let next = document.querySelector('.next');
let prev = document.querySelector('.prev');

if (next && prev) {
    next.addEventListener('click', function () {
        let items = document.querySelectorAll('.item');
        if (items.length > 0) {
            let firstItem = items[0];
            document.querySelector('.slide').appendChild(firstItem);
        }
    });

    prev.addEventListener('click', function () {
        let items = document.querySelectorAll('.item');
        if (items.length > 0) {
            let lastItem = items[items.length - 1];
            document.querySelector('.slide').prepend(lastItem);
        }
    });
} else {
    console.log("Next or Prev buttons not found.");
}


// Playlists Like Button Toggle
document.querySelectorAll('.like-button').forEach(button => {
    button.addEventListener('click', function() {
        this.classList.toggle('liked'); // Toggle liked state
    });
});