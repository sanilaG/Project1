<?php
// Database connection details
$email = $_POST["Email"];
$Password = $_POST["Password"];

$conn = mysqli_connect('localhost', 'root', '', 'project');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate email and password (perform additional checks as needed)
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Perform a query to check if the user already exists
    $checkUserQuery = "SELECT * FROM user WHERE Email='$email'";
    $checkUserResult = $conn->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // User already exists, display an error message or redirect to a signup page
        echo "User with this Email already exists.";
    } else {
        // Validate password
        if (strlen($Password) >= 8 && preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $Password)) {
            // Perform a query to insert the new user into the database
            $insertUserQuery = "INSERT INTO users (Email, Password) VALUES ('$email', '$Password')";

            if ($conn->query($insertUserQuery) === TRUE) {
                // User registered successfully, display success message and redirect to login page
                echo "Signup successful! You can now login.";
                header("Location: login.html");
                exit; // Ensure that no further code is executed after the redirect
            } else {
                // Error occurred, display an error message or redirect to an error page
                echo "Error: " . $insertUserQuery . "<br>" . $conn->error;
            }
        } else {
            // Invalid password format, display an error message or redirect to a signup page
            echo "Invalid password. Password should be at least 8 characters long and include special characters.";
        }
    }
} else {
    // Invalid email format, display an error message or redirect to a signup page
    echo "Invalid email format.";
}

$conn->close();
?>
