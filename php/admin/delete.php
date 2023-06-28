<?php
// Create a database connection
$conn = new mysqli("localhost", "root", "", "Project");

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
  // Sanitize the ID to prevent SQL injection
  $id = $conn->real_escape_string($_GET['id']);

  // Prepare and execute the delete statement
  $stmt = $conn->prepare("DELETE FROM form WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  // Check if the deletion was successful
  if ($stmt->affected_rows > 0) {
    echo "Record deleted successfully.";
  } else {
    echo "Error: Record not found.";
  }

  // Close the statement
  $stmt->close();
} else {
  echo "Error: ID parameter not provided.";
}

// Close the database connection
$conn->close();
?>
