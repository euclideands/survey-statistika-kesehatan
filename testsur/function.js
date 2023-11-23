$(document).ready(function () {
    $(".submit-button").click(function () {
      // Get the selected value
      var selectedValue = $("input[name='cubic']:checked").val();
  
      // Check if a value is selected
      if (selectedValue !== undefined) {
        // Send the selected value to the server using AJAX
        $.ajax({
          type: "POST",
          url: "save_responses.php",
          data: { response: selectedValue },
          success: function (response) {
            // Handle the server response (if needed)
            alert("Data saved successfully!");
          },
          error: function (xhr, status, error) {
            // Display a generic error alert if the AJAX request fails
            alert("Error: " + status + " - " + error);
          }
        });
      } else {
        // Display an alert if no value is selected
        alert("Please select a value before submitting.");
      }
    });
  });
  