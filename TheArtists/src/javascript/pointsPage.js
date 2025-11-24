$(document).ready(function () {
  const totalDays = 10; // Total days in the daily star coin section
  let currentDay = 1; // Starting day
  let totalPoints = 0; // Tracks total points

  // Function to generate days dynamically
  const generateDays = () => {
    for (let i = 1; i <= totalDays; i++) {
      $(".days-wrapper").append(`
        <div class="day" data-day="${i}">
          <p>Day ${i}</p>
          <div class="coin ${i < currentDay ? "earned" : ""}">
            ${i < currentDay ? '<img src="/Web Application Programming/image/pointsPage/star coins (1).png" alt="Earned">' : '<img src="/Web Application Programming/image/pointsPage/star coins (1).png" alt="Default">'}
          </div>
        </div>
      `);
    }
  };

  // Function to update total points
  const updateTotalPoints = (points) => {
    totalPoints += points;
    $("#totalPoints").text(totalPoints);
  };

  // Generate the days
  generateDays();

  // Claim button click event
  $("#claimBtn").click(function () {
    const todayCoin = $(`.day[data-day="${currentDay}"] .coin`);
    if (currentDay <= totalDays && !todayCoin.hasClass("earned")) {
      // Mark today's coin as earned and replace the icon with an image
      todayCoin.addClass("earned").html('<img src="/Web Application Programming/image/pointsPage/star coins.png" alt="Earned">');

      // Update total points
      updateTotalPoints(10);

      // Disable button and change text
      $(this).prop("disabled", true).text("Claimed");
      $(".text-center h2").text("Please come back tomorrow to claim your free star coins");

      // Increment to the next day
      currentDay++;
    }
  });

  // Enable the button for the first day
  $("#claimBtn").prop("disabled", false);
});