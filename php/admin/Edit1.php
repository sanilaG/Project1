<?php
// Create a database connection
$conn = new mysqli("localhost", "root", "", "Project");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$Blood = '';
$First_Name = '';
$Middle_Name = '';
$Last_Name = '';
$Phone = '';
$Address = '';
$Email = '';
$Dob = '';
$Gender = '';

// Check if the donor_id parameter is provdonor_ided
if (isset($_GET['donor_id'])) {
    // Retrieve the donor_id from the URL
    $donor_id = $_GET['donor_id'];

    // Retrieve the donor's information from the database
    $stmt = $conn->prepare("SELECT * FROM form WHERE donor_id = ?");
    if (!$stmt) {
        die("Error in query: " . mysqli_error($conn));
    }
    $stmt->bind_param("i", $donor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the donor exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Retrieve the donor's information
        $Blood = $row['Blood'];
        $First_Name = $row['First_Name'];
        $Middle_Name = $row['Middle_Name'];
        $Last_Name = $row['Last_Name'];
        $Phone = $row['Phone'];
        $Address = $row['Address'];
        $Email = $row['Email'];
        $Dob = $row['Dob'];
        $Gender = $row['Gender'];
    } else {
        // Donor not found
        echo "Donor not found.";
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted data
    $Blood = $_POST['Blood'];
    $First_Name = $_POST['First_Name'];
    $Middle_Name = $_POST['Middle_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $Email = $_POST['Email'];
    $Dob = $_POST['Dob'];
    $Gender = $_POST['Gender'];

    // Update the donor's information in the database
    $stmt = $conn->prepare("UPDATE form SET Blood = ?, First_Name = ?, Middle_Name = ?, Last_Name = ?, Phone = ?, Address = ?, Email = ?, Dob = ?, Gender = ? WHERE donor_id = ?");
    if (!$stmt) {
        die("Error in query: " . mysqli_error($conn));
    }
    $stmt->bind_param("sssssssssi", $Blood, $First_Name, $Middle_Name, $Last_Name, $Phone, $Address, $Email, $Dob, $Gender, $donor_id);
    $stmt->execute();

    // Close the statement
    $stmt->close();

    // Redirect to the select.php page after updating the donor information
    header("Location: select.php");
    exit();
}
// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Donor Form</title>
  <link rel="stylesheet" href="../../css/doner.css">
</head>
<body>
  <div class="center">
    <form action="select.php" method="post" class="form">
      <h2>Update donor form</h2>
      <p>Please answer the following questions correctly. This will help to protect you and the patient who receives your blood.</p>
      <div class="line"></div>
      <div class="question">
        <span class="question-label">What is your Blood type?</span><br>
        <label><input type="radio" value="O" name="Blood" <?php if ($Blood == 'O') echo 'checked'; ?>>O</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" value="O-" name="Blood" <?php if ($Blood == 'O-') echo 'checked'; ?>>O-</label><br>
        <label><input type="radio" value="A+" name="Blood" <?php if ($Blood == 'A+') echo 'checked'; ?>>A+</label>&nbsp;&nbsp;
        <label><input type="radio" value="A-" name="Blood" <?php if ($Blood == 'A-') echo 'checked'; ?>>A-</label><br>
        <label><input type="radio" value="B+" name="Blood" <?php if ($Blood == 'B+') echo 'checked'; ?>>B+</label>&nbsp;&nbsp;
        <label><input type="radio" value="B-" name="Blood" <?php if ($Blood == 'B-') echo 'checked'; ?>>B-</label><br>
        <label><input type="radio" value="AB+" name="Blood" <?php if ($Blood == 'AB+') echo 'checked'; ?>>AB+</label>&nbsp;&nbsp;
        <label><input type="radio" value="AB-" name="Blood" <?php if ($Blood == 'AB-') echo 'checked'; ?>>AB-</label>
      </div>

      <div class="question">
        <div donor_id="name">
          <label for="first-name">First Name:</label>
          <input type="text" class="name" name="First_Name" placeholder="Enter your first name" value="<?php echo $First_Name; ?>" required><br>
          <label for="middle-name">Middle Name:</label>
          <input type="text" class="name" name="Middle_Name" placeholder="Enter your middle name" value="<?php echo $Middle_Name; ?>"><br>
          <label for="last-name">Last Name:</label>
          <input type="text" class="name" name="Last_Name" placeholder="Enter your last name" value="<?php echo $Last_Name; ?>" required><br>
        </div>
      </div>
      <div class="question">
        <label for="phone">Phone Number:</label>
        <input type="text" donor_id="phone" name="Phone" placeholder="Enter your phone number" value="<?php echo $Phone; ?>" required>
        <?php if (isset($errors['Phone'])): ?>
    <span class="error"><?php echo $errors['Phone']; ?></span>
  <?php endif; ?>
  <?php
  if (isset($_POST['Phone'])) {
    $phone = $_POST['Phone'];
    if (!preg_match('/^\+977-98\d{8}$/', $phone)) {
      $errors['Phone'] = "Invaldonor_id phone number. Phone number should start with '+977-98' and have 10 digits.";
    }
  }
  if (isset($errors['Phone'])) {
    echo '<span class="error">' . $errors['Phone'] . '</span>';
  }
  ?>
    </div>
      <div class="question">
        <label for="address">Current Address:</label>
        <input type="text" donor_id="address" name="Address" placeholder="Enter your current address" value="<?php echo $Address; ?>" required>
      </div>

      <div class="question">
        <label for="email">Email:</label>
        <input type="email" donor_id="email" name="Email" placeholder="Enter your email address" value="<?php echo $Email; ?>" required>
      </div>

      <div class="question">
        <label for="dob">Birth Date:</label>
        <input type="date" donor_id="dob" name="Dob" value="<?php echo $Dob; ?>" required>
      </div>
      
      <div class="question">
        <label for="Gender">Gender:</label>
        <label><input type="radio" name="Gender" value="male" <?php if ($Gender == 'male') echo 'checked'; ?> required>Male</label>
        <label><input type="radio" name="Gender" value="female" <?php if ($Gender == 'female') echo 'checked'; ?>>Female</label>
        <label><input type="radio" name="Gender" value="other" <?php if ($Gender == 'other') echo 'checked'; ?>>Other</label>
      </div>

      <input type="submit" value="Update" donor_id="submit">
    </form>
  </div>
</body>
</html>

