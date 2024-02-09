<!DOCTYPE HTML>
<html>
<head>
    <title>Manage Donor List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
  /* styles.css */
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  color: #333;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

table th,
table td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center;
}

table th {
  background-color: #1abc9c;
  color: #fff;
}

table tr:nth-child(even) {
  background-color: #f2f2f2;
}

table tr:hover {
  background-color: #e0e0e0;
}

.title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}


.edit-link,
.delete-link {
  color: #0066cc;
  text-decoration: none;
  margin: 0 5px;
}

.edit-link:hover,
.delete-link:hover {
  text-decoration: underline;
}

  </style>
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
echo "<h1><b>Manage Donor list</b></h1>";
echo "<table>";
echo "<tr><th>ID</th><th>Blood</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Address</th><th>Email</th><th>Date of Birth</th><th>Gender</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['donor_id'] . "</td>";
  echo "<td>" . $row['Blood'] . "</td>";
  echo "<td>" . $row['First_Name'] . "</td>";
  echo "<td>" . $row['Last_Name'] . "</td>";
  echo "<td>" . $row['Phone'] . "</td>";
  echo "<td>" . $row['Address'] . "</td>";
  echo "<td>" . $row['Email'] . "</td>";
  echo "<td>" . $row['Dob'] . "</td>";
  echo "<td>" . $row['Gender'] . "</td>";
  echo "<td><a href='Edit1.php?id=" . $row['donor_id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['donor_id'] . "'>Delete</a></td>";
  echo "</tr>";
}

echo "</table>";





// Close the statement and database connecti
$stmt->close();
$conn->close();

          ?>

</div>
</body>
</html>


        
          
               
          