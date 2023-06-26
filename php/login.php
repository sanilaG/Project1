<?php
session_start();

// Database connection details
$conn = mysqli_connect('localhost', 'root', '', 'project');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$Email = $_POST['Email'];
$Password = $_POST['Password'];

// Perform a query to check if the user exists
$checkUserQuery = "SELECT * FROM users WHERE Email='$Email' AND Password='$Password'";
$checkUserResult = $conn->query($checkUserQuery);

if ($checkUserResult->num_rows > 0) {
    // User exists, set session variables and redirect to the dashboard or home page
    $_SESSION['Email'] = $Email;
    header("Location: dashboard.php"); // Replace "dashboard.php" with the desired page after login
    exit; // Ensure that no further code is executed after the redirect
} else {
    // User doesn't exist or incorrect login credentials, display an error message or redirect to the login page
    echo "Invalid login credentials. Please try again.";
}

$conn->close();
?>
