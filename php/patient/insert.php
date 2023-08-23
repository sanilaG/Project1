<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Escape user inputs to prevent SQL injection
    $Blood = $_POST["Blood"];
    $First_Name = $_POST["First_Name"];
    $Middle_Name = $_POST["Middle_Name"];
    $Last_Name = $_POST["Last_Name"];
    $Phone = $_POST["Phone"];
    $Email = $_POST["Email"]; // Fix typo here
    $Address = $_POST["Address"];
    $Gender = $_POST["Gender"];

    // Connection
    $connection = mysqli_connect('localhost', 'root', '', 'project');

    // Check connection
    // Check if the connection was successful
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Perform the Create operation (Insert the data into the database)
    $sql = "INSERT INTO patient (Blood, First_Name, Middle_Name, Last_Name, Phone, Email, Address, Gender) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ssssssss', $Blood, $First_Name, $Middle_Name, $Last_Name, $Phone, $Email, $Address, $Gender);

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
