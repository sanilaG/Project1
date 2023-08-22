<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        /* ... your existing CSS styles ... */
        <style>
        /* ... your existing CSS styles ... */
        /* Add your existing CSS styles here */

/* Style for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Style for table headers */
th {
    background-color: #f2f2f2;
    padding: 10px;
    text-align: left;
}

/* Style for table cells */
td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Style for action links */
td a {
    color: #337ab7;
    text-decoration: none;
    margin-right: 10px;
}

/* Style for action links on hover */
td a:hover {
    text-decoration: underline;
}

/* Style for different status */
td.pending {
    color: #ff9900;
    font-weight: bold;
}

td.accepted {
    color: #009900;
    font-weight: bold;
}

td.rejected {
    color: #cc0000;
    font-weight: bold;
}
    </style>
</head>
<body>
    <h1>Request Blood</h1>
    <?php
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
        } elseif ($action === "reject") {
            $newStatus = "Rejected";
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

    // Retrieve distinct pending requests from the database
    $sql = "SELECT DISTINCT * FROM patient WHERE donation_status = 'pending'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Address</th><th>Blood Type</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['First_Name']} {$row['Last_Name']}</td>";
            echo "<td>{$row['Phone']}</td>";
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
    ?>

</body>
</html>
