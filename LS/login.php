<?php
if(isset($post["submit"])){
    
<?php
$Email = $_POST['Email'];
$Password = $_POST['Password'];

}


?>









<?php
$Email = $_POST['Email'];
$Password = $_POST['Password'];

//database conection
$conn=new mysqli("localhost","root","","Project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//insert 
$stmt = $conn->prepare("INSERT INTO users (Email, Password) VALUES (?, ?)");
$stmt->bind_param("ss", $Email, $Password);

// Execute the query
if ($stmt->execute()) {
    // Insert successful
    echo "Record inserted successfully.";
} else {
    // Insert failed
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();




// display the query
$stmt = $conn->prepare("SELECT * FROM users");

// Execute the query
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Display records
    while ($row = $result->fetch_assoc()) {
        echo "Email: " . $row['Email'] . ", Password: " . $row['Password'] . "<br>";
    }
} else {
    // No records found
    echo "No records found.";
}

// Close the statement
$stmt->close();






//edit

$Email = $_POST['Email'];
$Password = $_POST['Password'];

// Prepare the query
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE Email = ?");
$stmt->bind_param("ss", $Password, $Email);

// Execute the query
if ($stmt->execute()) {
    // Update successful
    echo "Record updated successfully.";
} else {
    // Update failed
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();




$email = $_POST['Email'];

// Prepare the query
$stmt = $conn->prepare("DELETE FROM users WHERE Email = ?");
$stmt->bind_param("s", $Email);

// Execute the query
if ($stmt->execute()) {
    // Delete successful
    echo "Record deleted successfully.";
} else {
    // Delete failed
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();
 












?>

