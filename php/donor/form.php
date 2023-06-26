<?php

$errors = array(); // Initialize an empty array to store errors

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
   // Check if the age is less than 18
// Check if the age is less than 18
if ($age < 18) {
  echo '<script>alert("You are underage and cannot proceed.");</script>';
  $errors['Age'] = "You are underage and cannot proceed.";
  
  // Redirect to homepage.php
  echo '<script>window.location.href = "homepage.php";</script>';
  exit();
}

    // Check the phone number format
    if (isset($_POST['Phone'])) {
      $phone = $_POST['Phone'];
      if (!preg_match('/^\+977-98\d{8}$/', $phone)) {
        $errors['Phone'] = "Invalid phone number. Phone number should start with '+977-98' and have 10 digits.";
      }
    }

    // Check the email format
    if (isset($_POST['Email'])) {
      $email = $_POST['Email'];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['Email'] = "Invalid email format.";
      }
    }

    // If there are no errors, proceed with form submission
    if (empty($errors)) {
      // Check if the required fields are not empty
      if ($_POST['Blood'] != "" && $_POST['First_Name'] != "" && $_POST['Last_Name'] != "" && $_POST['Phone'] != "" && $_POST['Address'] != "" && $_POST['Dob'] != "" && $_POST['Gender'] != "") {
        // Retrieve form data
        $Blood = $_POST['Blood'];
        $First_Name = $_POST['First_Name'];
        $Middle_Name = $_POST['Middle_Name'];
        $Last_Name = $_POST['Last_Name'];
        $Phone = $_POST['Phone'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];
        $Dob = $_POST['Dob'];
        $Gender = $_POST['Gender'];

        // Create a database connection
        $conn = new mysqli("localhost", "root", "", "Project");

        // Check the connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Check if phone number or email already exists
        $stmt = $conn->prepare("SELECT * FROM form WHERE Phone = ? OR Email = ?");
        $stmt->bind_param("ss", $Phone, $Email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          // Phone number or email already exists
          $errors['Duplicate'] = "Phone number or email already exists.";
        } else {
          // Insert the data into the database
          $stmt = $conn->prepare("INSERT INTO form(Blood, First_Name, Middle_Name, Last_Name, Phone, Address, Email, Dob, Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("sssssssss", $Blood, $First_Name, $Middle_Name, $Last_Name, $Phone, $Address, $Email, $Dob, $Gender);
          $stmt->execute();

          // Close the statement and database connection
          $stmt->close();
          $conn->close();

          // Form submitted successfully
                    // Form submitted successfully
                    echo '<script>alert("Form submitted successfully.");</script>';

                    // Redirect to homepage.php if age is under 18
                    if ($age < 18) {
                      header("Location: homepage.php");
                      exit();
                    }
          
                    // Redirect to dashboard.php if form submitted successfully
                    header("Location:dashboard.php");
                    exit();
                  }
                } else {
                  // Required fields are empty
                  $errors['EmptyFields'] = "Please fill in all the required fields.";
                }
              }
            }
          }
          ?>
          
          <!-- HTML form code here -->
          <?php
          // Display errors, if any
          if (!empty($errors)) {
            echo "<ul>";
            foreach ($errors as $error) {
              echo "<li>$error</li>";
            }
            echo "</ul>";
          }

// Close the statement and database connecti

          ?>
          
