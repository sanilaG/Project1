<?php
// Establish database connection (replace 'dbname', 'username', 'password', and 'hostname' with your database credentials)
$conn = new mysqli('localhost', 'root', '', 'project');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['request_id'])) {
    $requestId = $_GET['request_id'];
    $status = 2; // 2 for rejected, you can customize this value as needed

    // Update the status in the database
    $stmt = $conn->prepare("UPDATE donation_requests SET status = ? WHERE id = ?");
    $stmt->bind_param("ii", $status, $requestId);
    
    if ($stmt->execute()) {
        // Successful update
        echo "Blood donation request rejected successfully!";
        // Redirect back to view_requests.php or any other desired location
        // header("Location: view_requests.php");
        // exit;
    } else {
        // Error during update
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>