<?php
// Create a database connection
$conn = new mysqli("localhost", "root", "", "Project");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash the password
$hashedPassword = password_hash("admin", PASSWORD_DEFAULT);

// Insert the admin user into the database
$insertAdminQuery = "INSERT INTO users1 (Email, Password, Role) VALUES ('admin@gmail.com', '$hashedPassword', 'admin')";
$insertResult = $conn->query($insertAdminQuery);

if ($insertResult === TRUE) {
    echo "Admin user inserted successfully.";
} else {
    echo "Error: " . $insertAdminQuery . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
