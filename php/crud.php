<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the submitted date of birth
  if (isset($_POST['Dob'])) {
    $Dob = $_POST['Dob'];

  // Calculate the age
  $today = new DateTime();
  $birthdate = new DateTime($Dob);
  $age = $today->diff($birthdate)->y;

  // Check if the age is less than 18
  if ($age < 18) {
    echo '<script>alert("You are underage and cannot proceed.");</script>';
  } else {
    // Age is 18 or above, insert form data into the 
    $Blood = $_POST['Blood'];
    $First_Name= $_POST['First_Name'];
    $Middle_Name= $_POST['Middle_Name'];
    $last_Name= $_POST['Last_Name'];
    $Phone= $_POST['Phone'];
    $Address = $_POST['Address'];
    $Email = $_POST['Email'];
    $Dob = $_POST['Dob'];
    $Gender = $_POST['Gender'];
    // Create a database connection
    $conn=new mysqli("localhost","root","","Project");

    // Check the connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $Blood = $_POST['Blood'];
    $first_Name= $_POST['First_Name'];
    $middle_Name= $_POST['Middle_Name'];
    $last_Namet= $_POST['Last_Name'];
    $Phone= $_POST['Phone'];
    $Address = $_POST['Address'];
    $Email = $_POST['Email'];
    $Dob = $_POST['Dob'];
    $Gender = $_POST['Gender'];
    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO form(Blood,First_Name',Middle_Name,Last_Name,Phone,Address,Email,Dob,Gender) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss",$Blood,$First_Name,$Middle_Name,$Last_Name,$Phone,$Address,$Email,$Dob,$Gender );
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    echo '<script>alert("Form submitted successfully.");</script>';
  }
}
}

?>



