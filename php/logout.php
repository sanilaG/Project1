<?php
    session_start();

    // Check if session is not set, redirect to homepage
    if (!isset($_SESSION['Email'])) {
        header("Location: homepage.php");
        exit();
    }

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to homepage
    header("Location: homepage.php");
    exit();
?>