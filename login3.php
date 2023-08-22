<?php
// Add error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create a database connection
$conn = new mysqli("localhost", "root", "", "Project");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the login form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Fetch user data from the database
    $checkUserQuery = "SELECT * FROM users1 WHERE Email='$Email'";
    $checkUserResult = $conn->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        $userData = $checkUserResult->fetch_assoc();

        // Verify password hash
        if (password_verify($Password, $userData['Password'])) {
            // Password is correct
            session_start();
            $_SESSION['Email'] = $Email;

            // Redirect to appropriate dashboard based on role
            if ($userData['Role'] === 'admin') {
                header("Location: php/admin/dashboard.php");
            } else {
                header("Location:userpage.php");
            }
            exit;
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User does not exist.";
    }
}

// Close the database connection
$conn->close();
?>
