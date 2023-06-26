<?php


// Create a database connection
$conn = new mysqli("localhost", "root", "", "Project");

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the id parameter is set in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Select the specific record based on the id
  $stmt = $conn->prepare("SELECT * FROM form WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  // Fetch the data
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Assign the values to variables for easy access
    $blood = $row['Blood'];
    $firstName = $row['First_Name'];
    $middleName = $row['Middle_Name'];
    $lastName = $row['Last_Name'];
    $phone = $row['Phone'];
    $address = $row['Address'];
    $email = $row['Email'];
    $dob = $row['Dob'];
    $gender = $row['Gender'];
  } else {
    // No record found with the given id
    echo "No record found.";
    exit;
  }

  // Close the statement
  $stmt->close();
} else {
  // id parameter is not set in the URL
  echo "Invalid request.";
  exit;
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
    <form action="crud.php" method="post" class="form">
      <h>Update donor form</h>
      <p>Please answer the following questions correctly. This will help to protect you and the patient who receives your blood.</p>
      <div class="line"></div>
      <div class="question">
        
        <span class="question-label" required>What is your blood type?</span><br>
        <label><input type="radio" value="O" name="Blood" <?php if ($blood == 'O') echo ' checked'; ?>>O</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" value="O-" name="Blood" <?php if ($blood == 'O-') echo ' checked'; ?>>O-</label><br>
        <label><input type="radio" value="A+" name="Blood " <?php if ($blood == 'A+') echo ' checked'; ?>>A+</label>&nbsp;&nbsp;
        <label><input type="radio" value="A-" name="Blood" <?php if ($blood == 'A-') echo ' checked'; ?>>A-</label><br>
        <label><input type="radio" value="B+" name="Blood" <?php if ($blood == 'B+') echo ' checked'; ?>>B+</label>&nbsp;&nbsp;
        <label><input type="radio" value="B-" name="Blood" <?php if ($blood == 'B-') echo ' checked'; ?> >B-</label><br>
        <label><input type="radio" value="AB+" name="Blood"<?php if ($blood == 'AB+') echo ' checked'; ?>  >AB+</label><label>
          <input type="radio" value="AB-" name="Blood"     <?php if ($blood == 'AB-') echo ' checked'; ?>  >AB-</label>
      </div>

      <div class="question">
        <div id="name">
        <label for="first-name">First Name:</label>
        <input type="text" class="name" name="First_Name" placeholder="Enter your first name" value="<?php echo $firstName; ?>" required><br>
        <label for="middle-name" >Middle Name:</label>
        <input type="text" class="name" name="Middle_Name" placeholder="Enter your middle name" value="<?php echo $middleName; ?>" ><br>
        <label for="last-name">Last Name:</label>
        <input type="text" class="name" name="Last_Name" placeholder="Enter your last name" value="<?php echo $lastName; ?>" required><br>
      </div>
      <div class="question">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="Phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>" required>
        <?php if (isset($errors['Phone'])): ?>
    <span class="error"><?php echo $errors['Phone']; ?></span>
  <?php endif; ?>
  <?php
  if (isset($_POST['Phone'])) {
    $phone = $_POST['Phone'];
    if (!preg_match('/^\+977-98\d{8}$/', $phone)) {
      $errors['Phone'] = "Invalid phone number. Phone number should start with '+977-98' and have 10 digits.";
    }
  }
  if (isset($errors['Phone'])) {
    echo '<span class="error">' . $errors['Phone'] . '</span>';

  }
  header("Location:select.php");
  ?>
  
        </div>
        <div class="question">
          
          <label for="phone">Current Address</label>:</label>
          <input type="text" id="address"  placeholder="Enter your current address" name="Address" value="<?php echo $address; ?>" required>
          </div>
        <div class="question">
        <label for="email">Email:</label>
        <input type="email" id="email" name="Email" placeholder="Enter your email address" value="<?php echo $email; ?>" required>
        <?php if (isset($errors['Email'])): ?>
        <span class="error"><?php echo $errors['Email']; ?></span>
      <?php endif; ?>
      
      </div>


      <div class="question">
        <label for="dob">Birth Date:</label>
        <input type="date" id="dob" name="Dob" value="<?php echo $dob; ?>"required>
        <?php if (isset($errors['Age'])): ?>
    <span class="error"><?php echo $errors['Age']; ?></span>
  <?php endif; ?>
        </div>
        
      <div class="question">
        <label for="gender">Gender:</label>
        <label><input type="radio" name="Gender" value="male" <?php if ($gender == 'male') echo 'checked'; ?> required>Male</label>
        <label><input type="radio" name="Gender" value="female" <?php if ($gender == 'female') echo 'checked'; ?>>Female</label>
        <label><input type="radio" name="Gender" value="other" <?php if ($gender == 'other') echo 'checked';?>>Other</label>
      </div>

     

      <input type="submit" value="update" id="submit">
    </form>
  </div>
</body>
</html>





