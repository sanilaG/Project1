<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color:#1abc9c;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .accept-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }

        .reject-button {
            background-color: #f44336;
            color: #f2f2f2;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }

        .accept-button:hover, .reject-button:hover {
            opacity: 0.8;
        }
        
    </style>

<h1>Donor Request</h1>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Create a database connection
$conn = new mysqli("localhost", "root", "", "project");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve pending requests from the database
$sql = "SELECT * FROM form WHERE donate_status = 'pending'";
$result = $conn->query($sql);

if ($result === false) {
    echo "Query error: " . mysqli_error($conn);
    exit;
}

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Address</th><th>Blood Type</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['donor_id']}</td>";
        echo "<td>{$row['First_Name']} {$row['Last_Name']}</td>";
        echo "<td>{$row['Phone']}</td>";
        echo "<td>{$row['Email']}</td>";
        echo "<td>{$row['Address']}</td>";
        echo "<td>{$row['Blood']}</td>";

        echo "<td>";
        echo "<a href='email1.php?donor_id={$row['donor_id']}&action=accept'>Accept</a> | ";
        echo "<a href='email1.php?donor_id={$row['donor_id']}&action=reject'>Reject</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No pending requests.";
}

// Close the database connection
$conn->close();
?>
</body>
</html>