<?php

session_start();
// Add error reporting for debugging
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

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

    // Validate email and password
    $errors = [];

    if (empty($Email)) {
        $errors[] = "Email field is required";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($Password)) {
        $errors[] = "Password field is required";
    } elseif (strlen($Password) < 8) {
        $errors[] = "Password should be at least 8 characters long";
    }
    if (!preg_match("/[a-z]/i", $_POST["Password"])) {
        $errors[] = "Password must contain at least one letter";
    }
    if (!preg_match("/[0-9]/", $_POST["Password"])) {
        $errors[] = "Password must contain at least one number";
    }

    if (empty($errors)) {
        // Fetch user data from the database
        $sql = "SELECT * FROM users1 WHERE Email='$Email' AND Password = '$Password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Role = $row['Role'];

            $_SESSION['Email'] = $Email; // Store user email in session variab
                

            // Redirect to appropriate dashboard based on role
            if ($Role === 'admin') {
                header("Location: php/admin/dashboard.php");
            } else {
                header("Location:userpage.php");
            }
            exit();
        } else {
            $errors[] = "Invalid user credentials";
        }
    }
        


    if (!empty($errors)) {
        // Display validation errors and alert message
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        echo '<script>alert("Invalid email or password");</script>';
        // Redirect back to login page
        echo '<script>window.location.href = "login.html";</script>';
    exit();
    }
}

// Close the database connection
$conn->close();
?>