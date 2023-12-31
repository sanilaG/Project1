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
    // ... Your existing code for email configuration ...

    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server host
    $mail->SMTPAuth = true;
    $mail->Username = 'bca210621_sanila@achsnepal.edu.np'; // Your SMTP username
    $mail->Password = 'apvqvghbadnqsbpb'; // Your SMTP password
    $mail->Port = 587; // SMTP port (usually 587 or 465)

    // Check if "id" is set in the URL
    if (isset($_GET['id'])) {
        // Fetch user email based on the provided ID
        $Email = fetchUserEmail($_GET['id']);

        if ($Email) {
            // Check if status is set
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                if ($status === 'accept') {
                    $emailSubject = "Request Accepted";
                    $emailMessage = "Your request has been accepted. Thank you for donating!";
                } elseif ($status === 'reject') {
                    $emailSubject = "Request Rejected";
                    $emailMessage = "We're sorry, but your request has been rejected. Please feel free to try again.";
                } else {
                    echo 'Invalid status provided.';
                    exit;
                }

                $mail->addAddress($Email); // Add recipient email address
                $mail->Subject = $emailSubject;
                $mail->Body = $emailMessage;

                // Send the email
                if ($mail->send()) {
                    echo 'Email sent and request status updated.';
                } else {
                    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            } else {
                echo 'No status provided.';
            }
        } else {
            echo 'User email not found.';
        }
    } else {
        echo 'No user ID provided.';
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
    $sql = "SELECT Email FROM patient WHERE id = $id";

    // For debugging purposes, print the query
    echo "SQL Query: $sql<br>";

    $result = $conn->query($sql);

    if ($result === false) {
        echo "Query error: " . $conn->error;
        return null;
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Email'];
    } else {
        return null; // No user found
    }
}
?>
