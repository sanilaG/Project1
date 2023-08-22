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
    $id = $_GET['id']; // Get the ID from the query parameter
    $Email = fetchUserEmail($id);

    // If user email is found, proceed to sending the email
    if ($Email) {
        // Set recipient and email content
        $mail->addAddress($Email, 'User Name');
        $mail->isHTML(true);
        $mail->Subject = 'Request Accepted';
        $mail->Body = 'Your request has been accepted.';
        
        // Send the email
        $mail->send();
        
        // Update request status in the database (you'll need to implement this)
        updateRequestStatus($id, 'accepted');
        
        echo 'Email sent and request status updated.';
    } else {
        echo 'User email not found.';
    }
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

// Function to fetch user's email from the database
function fetchUserEmail($id) {
    // Replace these lines with your actual database connection and query
    $conn = new mysqli("localhost", "root", "", "project");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Assuming the table name is "patient" and email is in the "Email" column
    $sql = "SELECT Email FROM patient WHERE id = $id"; // Use 'id' instead of 'request_id'
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Email'];
    } else {
        return null; // No user found
    }
}

// Function to update request status in the database
function updateRequestStatus($id, $status) {
    // Implement your database query to update the request status
    // For example: UPDATE patient SET donation_status = '$status' WHERE id = $id;
    $conn = new mysqli("localhost", "root", "", "project");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $updateSql = "UPDATE patient SET donation_status = '$status' WHERE id = $id";
    if ($conn->query($updateSql) === TRUE) {
        echo "Request status updated successfully.";
    } else {
        echo "Error updating status: " . $conn->error;
    }
    
    $conn->close();
}
?>

