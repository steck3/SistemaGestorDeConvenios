<?php

// Get the organismo value from the query string
$organismo = $_GET["organismo"];

// Query the database for the corresponding data
$sql = "SELECT nombre FROM organismos WHERE nombre = '$organismo'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
  // Get the data from the database
  $data = mysqli_fetch_assoc($result);

  // Return the data as JSON
  echo json_encode($data);
} else {
  // Error message
  echo "Error: " . mysqli_error($conn);
}

?>
