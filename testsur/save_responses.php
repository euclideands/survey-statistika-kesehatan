<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "statistika_kesehatan";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected value from the POST data
$selectedValue = $_POST['response'];

// Perform the database query
$sql = "INSERT INTO survey_responses (question_id, user_response) VALUES (1, '$selectedValue')";

if ($conn->query($sql) === TRUE) {
    // Send a success response to the client
    echo "Data saved successfully!";
} else {
    // Send an error response to the client
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
