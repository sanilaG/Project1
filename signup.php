<?php
// Create a database connection
$conn = new mysqli("localhost", "root", "", "Project");

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process the signup form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $Confirm_Password = $_POST["Confirm_Password"];
  
    $errors = array();

    // Perform additional validation checks for Email
    if (empty($Email)) {
        $errors[] = "Email field is required";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email format";
    }

    // Perform additional validation checks for Password
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
    
    // Perform additional validation checks for Confirm Password
    if (empty($Confirm_Password)) {
        $errors[] = "Confirm Password field is required";
    } elseif ($Password !== $Confirm_Password) {
        $errors[] = "Passwords do not match";
    }

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users1 WHERE Email = '$Email'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        $errors[] = "Email already exists, please use a different email";
    }

    // If there are any errors, handle them accordingly
    if (!empty($errors)) {
        // Use JavaScript to show the errors in an alert
        echo '<script>';
        echo 'var errorMessage = "' . implode('\n', $errors) . '";';
        echo 'alert(errorMessage);';
        echo '</script>';
    } else {
        // Insert the user data into the database
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT); // Hash the password

        $sql = "INSERT INTO users1 (Email, Password)
                VALUES ('$Email', '$hashedPassword')";

        if ($conn->query($sql) === true) {
            // Redirect to login_page.php when signup is successful
            header("Location: login.html");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // Clear the errors array after displaying the alert
    unset($errors);
}

// Close the database connection
$conn->close();
?>
