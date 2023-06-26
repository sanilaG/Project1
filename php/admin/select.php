<?php

include "../donor/form.php";
// Retrieve form data
// ...
// Create a database connection
$conn = new mysqli("localhost", "root", "", "Project");

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Select data from the database
$stmt = $conn->prepare("SELECT * FROM form");
$stmt->execute();
$result = $stmt->get_result();

// Display the data in a table
echo "<b>Manage Donor list</b>";
echo "<table>";
echo "<tr><th>ID</th><th>Blood</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Address</th><th>Email</th><th>Date of Birth</th><th>Gender</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['Blood'] . "</td>";
  echo "<td>" . $row['First_Name'] . "</td>";
  echo "<td>" . $row['Last_Name'] . "</td>";
  echo "<td>" . $row['Phone'] . "</td>";
  echo "<td>" . $row['Address'] . "</td>";
  echo "<td>" . $row['Email'] . "</td>";
  echo "<td>" . $row['Dob'] . "</td>";
  echo "<td>" . $row['Gender'] . "</td>";
  echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
  echo "</tr>";
}

echo "</table>";





// Close the statement and database connecti
$stmt->close();
$conn->close();

          ?>
          