<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Configure email settings
    $mail->isSMTP();
    $mail->Host = 'localhost'; // Use 'localhost' for local development
    $mail->SMTPAuth = false;   // No need for authentication in most local setups
    $mail->Port = 25;          // Default SMTP port for most local servers

    // Set sender's address
    $mail->setFrom('bca210621_sanila@achsnepal.edu.np','Sanila Gharti');

    // Retrieve user's email address from the database based on the request
    $id = $_GET['id']; // Get the id from the URL
    $Email = fetchUserEmail($id);

    // Rest of your email sending logic here...
    // (Use the code you previously provided for email sending)

} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

/
// Assuming you have a link like this in your request_blood.php:
// <a href='email.php?id={$row['id']}'>Send Email</a>

// In your email.php:
$id = $_GET['id']; // Get the id from the URL
$Email = fetchUserEmail($id);

// Function to fetch user's email from the database
function fetchUserEmail($id) {
    // Replace these lines with your actual database connection and query
    $conn = new mysqli("localhost", "root", "", "project");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT Email FROM patient WHERE id = $id"; // Assuming the email column is 'Email'
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Email'];
    } else {
        return null; // No user found
    }
}
