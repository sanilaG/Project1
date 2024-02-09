<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

$mail = new PHPMailer(true);

try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bca210621_sanila@achsnepal.edu.np';
    $mail->Password = 'apvqvghbadnqsbpb';
    $mail->Port = 587;

    if (isset($_GET['donor_id'])) {
        $donor_id = $_GET['donor_id'];

        // Fetch donor email based on the provided donor_id
        $Email = fetchDonorEmail($donor_id);

        if ($Email) {
            if (isset($_GET['action'])) {
                $status = $_GET['action'];
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

                $mail->addAddress($Email);
                $mail->Subject = $emailSubject;
                $mail->Body = $emailMessage;

                if ($mail->send()) {
                    echo 'Email sent and donor status updated.';
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
        echo 'No donor ID provided.';
    }
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

function fetchDonorEmail($donor_id) {
    $conn = new mysqli("localhost", "root", "", "project");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Email FROM form WHERE donor_id = $donor_id";

    $result = $conn->query($sql);

    if ($result === false) {
        echo "Query error: " . $conn->error;
        return null;
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Email'];
    } else {
        return null;
    }
}
?>
