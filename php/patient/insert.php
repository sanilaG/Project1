<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Escape user inputs to prevent SQL injection
$Blood = $_POST["Blood"];
$First_Name = $_POST["First_Name"];
$Middle_Name = $_POST["Middle_Name"];
$Last_Name = $_POST["Last_Name"];
$Phone = $_POST["Phone"];
$Address = $_POST["Address"];
$Gender = $_POST["Gender"];

//connection
$connection = mysqli_connect('localhost', 'root', '', 'project');

//check connection
// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Perform the Create operation (Insert the data into the database)
$sql = "INSERT INTO patient (Blood, First_Name, Middle_Name, Last_Name, Phone, Address, Gender) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $connection->prepare($sql);
$stmt->bind_param('sssssss', $Blood, $First_Name, $Middle_Name, $Last_Name, $Phone, $Address, $Gender);

if ($stmt->execute()) {
    echo "Record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$stmt->close();
mysqli_close($connection);
}
?>
