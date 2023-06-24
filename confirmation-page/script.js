$(document).ready(function() {
    // Retrieve and display booking details using AJAX
    $.ajax({
      url: 'booking_details.php',    // actual url of checkout page 
      method: 'POST',
      success: function(response) {
        // Populate the 'bookingDetails' div with the retrieved data
        $('#bookingDetails').html(response);
      }
    });
  });
  