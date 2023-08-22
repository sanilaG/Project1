<!DOCTYPE html>
<html>
    <head>
        <title> Login page</title>
    </head>
    <link rel="stylesheet" href="../css/login.css">
    <body>
        <div class="center">
         
          <form action="../php/login.php" method="Post" class="form">
          <h2>Login</h2>
        
            <input type="text" placeholder="Enter email address" name="Email" class="box">
            <input type="password" placeholder="Enetr password" name="Password" class="box">
            <input type="submit" value="login" id="submit"><br>
            <a href="#">Forget password ?</a> 
            <div class="sign"> 
                Create new account&nbsp;&nbsp;<a href="signup.html">sign up</a></div>
          </form>
          <div class="side">
            <img src="../jpg/blood.png" alt="">
          </div>
        </div>
        
        
    </body>
</html>
<?php
// Replace the following with your actual database connection logic
$servername = "localhost";
$username = "db_username";
$password = "db_password";
$dbname = "db_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    // Perform database query to check if the user exists and get user role
    $sql = "SELECT user_type FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userType = $row["user_type"];

        // Redirect to the appropriate panel based on user type
        if ($userType == "admin") {
            header("Location: admin_panel.php");
        } elseif ($userType == "donor" || $userType == "patient") {
            header("Location: user_panel.php?type=$userType");
        }
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>




