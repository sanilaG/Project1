<html>
    <head>
</head>
<body>
    
<style>
     body {
        margin: 0;
        padding: 0;
    }
    .navbar {
            display: flex;
            position: sticky;
            top:0%;
            z-index: 1;
            background-color: maroon;
            padding: 0;
            margin: 0;
            height:70px;
            justify-content: center;

        }

        .navbar h1 {
        font-size: 30px; /* Adjust the font size */
        color: white; /* Change the text color */
    }

    

.container {
        display: flex;
         /* Distributes items along the main axis */
    }
    /* CSS for the rectangle boxes */
    .user-box {
        border: 1px solid #ddd;

        width: 250px;/* Adjust the width as needed */
        height: 210px;
        padding: 10px;
        margin-right: 20px; 
        background-color:red;
       box-shadow: 10px 20px 3px;
      margin-top:10px;
    }
    
    
</style>

<nav class="navbar">
    <h1>Available Donors</h1>
</nav>
<footer>
    
               
        

<div class="container">
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
            while ($row = $result->fetch_assoc()) {
                echo '<div class="user-box">';
        echo '<p class="name">' . $row['First_Name'] . ' ' . $row['Middle_Name'] . ' ' . $row['Last_Name'] . '</p>';
        echo '<p>Phone: ' . $row['Phone'] . '</p>';
        echo '<p>Address: ' . $row['Address'] . '</p>';
        echo '<p>Email: ' . $row['Email'] . '</p>';
        echo '<p>Date of Birth: ' . $row['Dob'] . '</p>';
        echo '<p>Gender: ' . $row['Gender'] . '</p>';
        echo '</div>';
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
</body>
</html>

