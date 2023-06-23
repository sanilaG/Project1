<?php
$Email = $_POST['Email'];
$Password = $_POST['Password'];

//database conection
$conn=new mysqli("localhost","root","","Project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>