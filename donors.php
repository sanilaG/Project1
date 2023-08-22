<div id="bloodTypeContent">
    <?php
    if (isset($_GET['bloodType'])) {
        $selectedBloodType = $_GET['bloodType'];

        // Create a database connection
        $conn = new mysqli("localhost", "root", "", "project");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data based on selected blood type
        $sql = "SELECT * FROM form WHERE Blood = '$selectedBloodType'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Phone</th><th>Address</th><th>Email</th><th>Date of Birth</th><th>Gender</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['First_Name'] . " " . $row['Middle_Name'] . " " . $row['Last_Name'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Dob'] . "</td>";
                echo "<td>" . $row['Gender'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No data available for the selected blood type.";
        }

        $conn->close();
    } else {
        echo "Blood type not specified.";
    }
    ?>
</div>
