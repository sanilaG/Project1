<!DOCTYPE html>
<html>
<head>
    <title>Login page</title>
</head>
<link rel="stylesheet" href="../css/login.css">
<body>
    <div class="center">
     
        <form action="../php/login.php" method="post" class="form">
            <h2>Login</h2>
        
            <input type="text" placeholder="Enter email address" name="Email" class="box">
            <input type="password" placeholder="Enter password" name="Password" class="box">

            <!-- Add the user type selection -->
            <label for="user_type">Select User Type:</label>
            <select id="user_type" name="UserType">
                <option value="admin">Admin</option>
                <option value="donor">Donor</option>
                <option value="patient">Patient</option>
            </select>

            <input type="submit" value="Login" id="submit"><br>
            <a href="#">Forget password ?</a> 
            <div class="sign"> 
                Create new account&nbsp;&nbsp;<a href="signup.html">Sign Up</a>
            </div>
        </form>
        <div class="side">
            <img src="../jpg/blood.png" alt="">
        </div>
    </div> 
</body>
</html>
<?php
// Replace the following with your actual database connection logic


// Create a database connection
$conn = new mysqli("localhost", "root", "", "Project");

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Handle the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $userType = $_POST["userType"]; // Get the selected user type

    // Perform database query to check if the user exists and get user role
    $sql = "SELECT user_type FROM user1 WHERE email = '$Email' AND Password = '$Password' AND user_type = '$userType'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists with the correct user type  
        if ($userType == "admin") {
            header("Location: admin_panel.php");
        } elseif ($userType == "donor" || $userType == "patient") {
            header("Location: user_panel.php?type=$userType");
        }
    } else {
        echo "Invalid username, password, or user type";
    }
}

$conn->close();
?>
