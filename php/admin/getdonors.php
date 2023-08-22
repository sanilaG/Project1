<?php
// Your database connection and query to get donors with the selected blood type
// For this example, assume you have a MySQL database with a "form" table

// Create a database connection
$conn = new mysqli("localhost", "root", "", "project");

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Your database connection code here...

// Sample query to fetch donors for each blood group
$query = "SELECT * FROM form";
$result = mysqli_query($conn, $query);

// Fetch donors from the result
$donors = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Calculate the total number of donors for each blood group
$bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
$donorCounts = array_fill_keys($bloodGroups, 0);

foreach ($donors as $donor) {
    $bloodType = $donor['Blood'];
    if (in_array($bloodType, $bloodGroups)) {
        $donorCounts[$bloodType]++;
    }
}

// Combine the donor data and counts in a single array
$responseData = array('donors' => $donors, 'counts' => $donorCounts);

// Return the combined data as JSON
echo json_encode($responseData);
?>
