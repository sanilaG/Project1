<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        /* ... your existing CSS styles ... */
        /* Add your existing CSS styles here */
    </style>
</head>
<body>
    <h1>Request Blood</h1>
    <?php

require '../include/email.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "project");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Initialize variables
    $id = 0;
    $action = "";

    if (isset($_GET['id']) && isset($_GET['action'])) {
        $id = $_GET['id'];
        $action = $_GET['action'];

        // Determine the new status for donation
        $newStatus = "";
        if ($action === "accept") {
            $newStatus = "Accepted";
            // TODO: Send email to user indicating acceptance
            sendEmailToUser($id, $newStatus);
        } elseif ($action === "reject") {
            $newStatus = "Rejected";
            // TODO: Send email to user indicating rejection
            sendEmailToUser($id, $newStatus);
        }

        if ($newStatus !== "") {
            // Update the status of the request in the database
            $adminUpdateSql = "UPDATE patient SET donation_status = '$newStatus' WHERE id = $id";
            if ($conn->query($adminUpdateSql) === TRUE) {
                // Redirect back to the admin dashboard
                header("Location: admin_dashboard.php");
                exit();
            } else {
                echo "Error updating status: " . $conn->error;
            }
        }
    }

    // Retrieve pending requests from the database
    $sql = "SELECT * FROM patient WHERE donation_status = 'pending'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Address</th><th>Blood Type</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['First_Name']} {$row['Last_Name']}</td>";
            echo "<td>{$row['Phone']}</td>";
            echo "<td>{$row['Email']}</td>";
            echo "<td>{$row['Address']}</td>";
            echo "<td>{$row['Blood']}</td>";

            echo "<td>";
            echo "<a href='?id={$row['id']}&action=accept'>Accept</a> | ";
            echo "<a href='?id={$row['id']}&action=reject'>Reject</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No pending requests.";
    }

    // Close the database connection
    $conn->close();

    // Function to send an email to the user
    function sendEmailToUser($id, $status) {
        // ... Your code to send an email to the user ...
    }
    ?>
</body>
</html>
